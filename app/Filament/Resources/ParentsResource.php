<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParentsResource\Pages;
use App\Filament\Resources\ParentsResource\RelationManagers;
use App\Models\Parents;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParentsResource extends Resource
{
    protected static ?string $model = Parents::class;

    protected static ?string $navigationLabel = 'Padres/Tutores';

    protected static ?string $modelLabel = 'Padre/Tutor';

    protected static ?string $pluralModelLabel = 'Padres/Tutores';

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('identification'),
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('last_name'),
                Forms\Components\TextInput::make('gender')
                    ->required(),
                Forms\Components\DatePicker::make('born_date'),
                Forms\Components\TextInput::make('address'),
                Forms\Components\TextInput::make('phone')
                    ->tel(),
                Forms\Components\TextInput::make('residence_phone')
                    ->tel(),
                Forms\Components\TextInput::make('work_phone')
                    ->tel(),
                Forms\Components\TextInput::make('work_phone_ext')
                    ->tel(),
                Forms\Components\TextInput::make('relationship')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('identification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('born_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('residence_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_phone_ext')
                    ->searchable(),
                Tables\Columns\TextColumn::make('relationship')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListParents::route('/'),
            'create' => Pages\CreateParents::route('/create'),
            'edit' => Pages\EditParents::route('/{record}/edit'),
        ];
    }
}
