<?php

namespace App\Filament\Pages\Settings;

use Closure;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\ButtonAction;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;

class Settings extends BaseSettings
{
    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('General')
                        ->schema([
                            TextInput::make('general.nombre')
                                ->required(),
                            TextInput::make('general.direccion')
                                ->required(),
                            TextInput::make('general.correo')
                                ->required(),
                            TextInput::make('general.telefono')
                                ->numeric()
                                ->required(),
                        ]),
                ]),
        ];
    }

    public function getFormActions(): array
    {
        return [];
    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make('save')
                ->label('Guardar cambios')
                ->action('save'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Configuraciones';
    }

    public function getTitle(): string
    {
        return 'Configuraciones';
    }

}
