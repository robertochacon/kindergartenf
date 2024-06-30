<?php

namespace App\Filament\Resources\KidsResource\Pages;

use App\Filament\Resources\KidsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKids extends EditRecord
{
    protected static string $resource = KidsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
