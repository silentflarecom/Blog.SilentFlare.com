<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-generate excerpt from content if not provided
        if (empty($data['excerpt']) && !empty($data['content'])) {
            $data['excerpt'] = Str::limit(strip_tags($data['content']), 200);
        }

        return $data;
    }
}
