<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BitacoraResource\Pages;
use App\Filament\Resources\BitacoraResource\RelationManagers;
use App\Models\Bitacora;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BitacoraResource extends Resource
{
    protected static ?string $model = Bitacora::class;

    protected static ?string $navigationLabel = 'Historial';

    protected static ?string $modelLabel = 'Historial';

    protected static ?string $pluralModelLabel = 'Historial';

    protected static ?string $navigationIcon = 'heroicon-m-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->label('Registrado')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBitacoras::route('/'),
            'create' => Pages\CreateBitacora::route('/create'),
            'edit' => Pages\EditBitacora::route('/{record}/edit'),
        ];
    }
}
