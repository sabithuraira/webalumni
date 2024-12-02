<?php

namespace App\Filament\Admin\Resources\KeuanganResource\Pages;

use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\KeuanganResource;

class CreateKeuangan extends CreateRecord
{
    protected static string $resource = KeuanganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();

        return $data;
    }
}
