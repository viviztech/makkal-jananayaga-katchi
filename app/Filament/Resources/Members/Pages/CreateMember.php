<?php

namespace App\Filament\Resources\Members\Pages;

use App\Filament\Resources\Members\MemberResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    public function getMaxContentWidth(): Width|string|null
    {
        return Width::Full;
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $stateId = $data['state_id'] ?? null;
        $data['member_no'] = \App\Models\Member::generateMembershipId($stateId);
        return $data;
    }
}
