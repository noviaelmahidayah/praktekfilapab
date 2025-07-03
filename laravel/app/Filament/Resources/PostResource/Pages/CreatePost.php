<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
    
        return $data;
    }

    protected function afterCreate(): void
{
    $images = $this->form->getState()['featured_image'] ?? null;

    if ($images) {
        foreach ((array) $images as $image) {
            $this->record
                ->addMedia($image)
                ->toMediaCollection('featured_image'); // sesuaikan nama koleksi
        }
    }
}


}

