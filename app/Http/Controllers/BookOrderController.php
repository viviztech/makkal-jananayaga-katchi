<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookOrderRequest;
use App\Models\Book;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class BookOrderController extends Controller
{
    public function store(BookOrderRequest $request)
    {
        try {
            $book = Book::findOrFail($request->book_id);

            // Check if book is available
            if (!$book->is_available || !$book->is_active || $book->stock < $request->quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Book is not available in the requested quantity.'
                ], 400);
            }

            $unitPrice = $book->price;
            $totalAmount = $unitPrice * $request->quantity;

            // Create order with pending status
            $order = BookOrder::create([
                'book_id' => $book->id,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'shipping_address' => $request->shipping_address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'quantity' => $request->quantity,
                'unit_price' => $unitPrice,
                'total_amount' => $totalAmount,
                'payment_status' => 'pending',
                'order_status' => 'pending',
            ]);

            // Initialize Razorpay
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Create Razorpay order
            $razorpayOrder = $api->order->create([
                'amount' => $totalAmount * 100, // Razorpay expects amount in paisa
                'currency' => 'INR',
                'receipt' => $order->order_number,
            ]);

            // Update order with Razorpay order ID
            $order->update(['razorpay_order_id' => $razorpayOrder->id]);

            return response()->json([
                'order_id' => $razorpayOrder->id,
                'amount' => $razorpayOrder->amount,
                'currency' => $razorpayOrder->currency,
                'book_order_id' => $order->id,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order: ' . $e->getMessage()
            ], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        try {
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Find order by Razorpay order ID and update
            $order = BookOrder::where('razorpay_order_id', $request->razorpay_order_id)->firstOrFail();

            if ($order) {
                $order->update([
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature,
                    'payment_status' => 'success',
                    'order_status' => 'processing',
                ]);

                // Update book stock
                $book = $order->book;
                $book->stock = max(0, $book->stock - $order->quantity);
                if ($book->stock == 0) {
                    $book->is_available = false;
                }
                $book->save();

                return response()->json([
                    'success' => true,
                    'order_id' => $order->id,
                    'order_number' => $order->order_number,
                    'message' => 'Payment verified successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 404);

        } catch (\Exception $e) {
            // Mark payment as failed
            if (isset($request->razorpay_order_id)) {
                $order = BookOrder::where('razorpay_order_id', $request->razorpay_order_id)->first();
                if ($order) {
                    $order->update(['payment_status' => 'failed']);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed: ' . $e->getMessage()
            ], 400);
        }
    }

    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = BookOrder::find($orderId);

        if (!$order) {
            return redirect()->route('books')->with('error', 'Order not found');
        }

        return view('pages.book-order-success', compact('order'));
    }
}
