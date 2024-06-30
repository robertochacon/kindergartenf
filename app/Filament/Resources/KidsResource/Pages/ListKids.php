<?php

namespace App\Filament\Resources\KidsResource\Pages;

use App\Filament\Resources\KidsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKids extends ListRecords
{
    protected static string $resource = KidsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
