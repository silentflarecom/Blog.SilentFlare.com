<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FriendLinkResource\Pages;
use App\Models\FriendLink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FriendLinkResource extends Resource
{
    protected static ?string $model = FriendLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Friend Links';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->url()
                            ->maxLength(500),
                        Forms\Components\TextInput::make('avatar')
                            ->url()
                            ->maxLength(500)
                            ->helperText('URL to avatar image'),
                        Forms\Components\Textarea::make('description')
                            ->rows(2)
                            ->maxLength(300),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('')
                    ->circular()
                    ->defaultImageUrl(fn (FriendLink $record) => 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . urlencode($record->name)),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->limit(30)
                    ->url(fn (FriendLink $record): string => $record->url)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFriendLinks::route('/'),
            'create' => Pages\CreateFriendLink::route('/create'),
            'edit' => Pages\EditFriendLink::route('/{record}/edit'),
        ];
    }
}
