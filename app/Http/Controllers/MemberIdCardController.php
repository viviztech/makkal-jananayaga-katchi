<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class MemberIdCardController extends Controller
{
    /**
     * Download ID Card
     */
    public function download(Request $request, $member, $type = 'full')
    {
        $member = Member::with(['district', 'assembly', 'state'])->findOrFail($member);
        
        try {
            switch ($type) {
                case 'full':
                    $pdf = Pdf::view('pdf.member-id-card-full', ['member' => $member])
                        ->noSandbox()          // Essential for production servers
                        ->timeout(120)         // Increase timeout to 2 minutes
                        ->showBackground()     // Show background colors/images
                        ->format('A4')
                        ->orientation('portrait')
                        ->name('member-id-card-' . $member->id . '-full.pdf');
                    break;

                case 'front':
                    $pdf = Pdf::view('pdf.member-id-card-front', ['member' => $member])
                        ->noSandbox()          // Essential for production servers
                        ->timeout(120)         // Increase timeout to 2 minutes
                        ->showBackground()     // Show background colors/images
                        ->name('member-id-card-' . $member->id . '-front.pdf');
                    break;

                case 'back':
                    $pdf = Pdf::view('pdf.member-id-card-back', ['member' => $member])
                        ->noSandbox()          // Essential for production servers
                        ->timeout(120)         // Increase timeout to 2 minutes
                        ->showBackground()     // Show background colors/images
                        ->name('member-id-card-' . $member->id . '-back.pdf');
                    break;

                default:
                    abort(404, 'Invalid download type');
            }

            return $pdf->download();
        } catch (\Exception $e) {
            \Log::error('Member ID Card PDF Generation Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'member_id' => $member->id,
                'type' => $type,
            ]);

            return back()->with('error', 'Failed to generate ID card PDF. Please try again or contact support.');
        }
    }
}

