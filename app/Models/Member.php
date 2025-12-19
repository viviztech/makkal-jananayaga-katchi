<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\Traits\HasImageUrl;

class Member extends Model
{
    use HasFactory, HasImageUrl;
    protected $guarded = [];

    protected $appends = [
        'photo_url',
    ];

    /**
     * Get the photo URL attribute
     *
     * @return string|null
     */
    public function getPhotoUrlAttribute(): ?string
    {
        if (empty($this->photo)) {
            return null;
        }
        return $this->getStorageUrl($this->photo, 'public');
    }

    /**
     * Generate next membership id for a given state.
     * Format: {STATE_CODE}VCK{5-digit zero-padded sequence}
     */
    public static function generateMembershipId(?int $stateId): string
    {
        // Fallback code if state or code not available
        $fallback = 'XX';

        if ($stateId) {
            return DB::transaction(function () use ($stateId, $fallback) {
                // Lock or create sequence row
                $sequence = DB::table('member_sequences')->where('state_id', $stateId)->lockForUpdate()->first();

                if ($sequence) {
                    $next = $sequence->last_number + 1;
                    DB::table('member_sequences')->where('state_id', $stateId)->update(['last_number' => $next, 'updated_at' => now()]);
                } else {
                    $next = 1;
                    DB::table('member_sequences')->insert([
                        'state_id' => $stateId,
                        'last_number' => $next,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $state = State::find($stateId);
                $code = $fallback;
                if ($state) {
                    if (!empty($state->code)) {
                        $code = strtoupper(preg_replace('/\s+/', '', $state->code));
                    } elseif (!empty($state->name_en)) {
                        $code = strtoupper(substr(preg_replace('/\s+/', '', $state->name_en), 0, 2));
                    }
                }

                return sprintf('%sVCK%s', $code, str_pad((string)$next, 5, '0', STR_PAD_LEFT));
            });
        }

        // No state provided: increment a global sequence row with state_id = 0
        return DB::transaction(function () use ($fallback) {
            $sequence = DB::table('member_sequences')->where('state_id', 0)->lockForUpdate()->first();

            if ($sequence) {
                $next = $sequence->last_number + 1;
                DB::table('member_sequences')->where('state_id', 0)->update(['last_number' => $next, 'updated_at' => now()]);
            } else {
                $next = 1;
                DB::table('member_sequences')->insert([
                    'state_id' => 0,
                    'last_number' => $next,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return sprintf('%sVCK%s', $fallback, str_pad((string)$next, 5, '0', STR_PAD_LEFT));
        });
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }
}