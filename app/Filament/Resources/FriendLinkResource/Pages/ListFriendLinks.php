<?php

namespace App\Filament\Resources\FriendLinkResource\Pages;

use App\Filament\Resources\FriendLinkResource;
use Filament\Resources\Pages\ListRecords;

class ListFriendLinks extends ListRecords
{
    protected static string $resource = FriendLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
