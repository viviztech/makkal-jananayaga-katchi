<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'member_id',
        'district_id',
        'address',
        'city',
        'state',
        'pincode',
        'pan_number',
        'amount',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'payment_status',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
