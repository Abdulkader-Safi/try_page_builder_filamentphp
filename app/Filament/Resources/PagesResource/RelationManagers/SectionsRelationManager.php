<?php

namespace App\Filament\Resources\PagesResource\RelationManagers;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'sections';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->label('Section Type')
                    ->columnSpanFull()
                    ->options([
                        'type1' => 'type1',
                        'type2' => 'type2',
                        'break_line' => 'break_line',
                    ])
                    ->reactive()
                    ->required(),

                TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),


                // Content Title - Visible for type1 and type2
                TextInput::make('content.title')
                    ->label('Content Title')
                    ->visible(fn($get) => in_array($get('type'), ['type1', 'type2']))
                    ->columnSpanFull()
                    ->maxLength(255),

                // Content Image - Only visible for type1
                FileUpload::make('content.image')
                    ->label('Content Image')
                    ->visible(fn($get) => $get('type') === 'type1')
                    ->columnSpanFull()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->maxSize(10240 * 2)
                    ->image(),

                // Content Description - Only visible for type2
                TextInput::make('content.description')
                    ->label('Content Description')
                    ->visible(fn($get) => $get('type') === 'type2')
                    ->columnSpanFull()
                    ->maxLength(255),


                Card::make([
                    Checkbox::make('is_public')
                        ->label('Public')
                        ->inline()
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }
}