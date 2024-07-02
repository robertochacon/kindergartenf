<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KidsResource\Pages;
use App\Filament\Resources\KidsResource\RelationManagers;
use App\Models\Kids;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KidsResource extends Resource
{
    protected static ?string $model = Kids::class;

    protected static ?string $navigationLabel = 'Niños';

    protected static ?string $modelLabel = 'Niño';

    protected static ?string $pluralModelLabel = 'Niños';

    protected static ?string $navigationIcon = 'heroicon-s-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Niño')
                        ->description('Información del niño')
                        ->schema([
                            Section::make('Información del general')
                            // ->description('Informaciónes relevantes del niño')
                            ->schema([
                                Forms\Components\TextInput::make('name'),
                                Forms\Components\TextInput::make('last_name'),
                                Select::make('gender')
                                    ->required()
                                    ->label('Genero')
                                    ->options([
                                        'Femenino' => 'Femenino',
                                        'Masculino' => 'Masculino',
                                    ]),
                                Forms\Components\DatePicker::make('born_date'),
                                Forms\Components\TextInput::make('address'),
                                Forms\Components\TextInput::make('insurance'),
                                Forms\Components\TextInput::make('insurance_number'),
                                Forms\Components\Textarea::make('allergies')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('medical_conditions')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('medications')
                                    ->columnSpanFull(),
                            ])->columnSpan(2)->columns(2),
                            Group::make()
                            ->schema([
                                Section::make('Perfil')
                                    ->collapsible()
                                    ->schema([
                                        FileUpload::make('imagen')
                                        ->label(false)
                                        ->image()
                                        ->avatar()
                                        ->imageEditor()
                                        ->circleCropper()
                                        ->alignCenter(true)
                                    ])->columnSpan(1)
                            ])
                        ])->columns([
                            'default'=>3,
                            'sm'=>3,
                            'md'=>3,
                            'lg'=>3,
                        ]),
                    Wizard\Step::make('Padres')
                        ->description('Información de los padres')
                        ->schema([
                            Repeater::make('fathers')
                            ->schema([
                                Forms\Components\TextInput::make('name')->required(),
                                Select::make('relationship')
                                    ->options([
                                        'Padre' => 'Padre',
                                        'Madre' => 'Madre',
                                    ])
                                    ->required(),
                                    Forms\Components\TextInput::make('identification'),
                                    Forms\Components\TextInput::make('phone'),
                                    Forms\Components\TextInput::make('address'),
                                    Forms\Components\TextInput::make('work_phone'),
                                    Forms\Components\TextInput::make('work_phone_ext'),
                            ])
                            ->cloneable()
                            ->columns(3)
                        ]),
                    Wizard\Step::make('Tutores')
                        ->description('Información de los padres')
                        ->schema([
                            // ...
                        ]),
                ])
                ->skippable()
                ->columnSpanFull()
                ->persistStepInQueryString()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                Tables\Columns\TextColumn::make('insurance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('insurance_number')
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
            'index' => Pages\ListKids::route('/'),
            'create' => Pages\CreateKids::route('/create'),
            'edit' => Pages\EditKids::route('/{record}/edit'),
        ];
    }
}
