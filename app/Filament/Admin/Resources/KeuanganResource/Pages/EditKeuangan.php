<?php

namespace App\Filament\Admin\Resources\KeuanganResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\KeuanganResource;

class EditKeuangan extends EditRecord
{
    protected static string $resource = KeuanganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = Auth::id();

        return $data;
    }
}
