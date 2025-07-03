<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Http\UploadedFile;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),    
            Actions\Action::make('publish')
                ->color('success')  
                ->icon('heroicon-o-arrow-top-right-on-square'),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Hapus gambar lama jika ada gambar baru yang diupload
        if (isset($data['image']) && $data['image']) {
            $this->record->clearMediaCollection('images');
        }

        return $data;
    }

    protected function afterSave(): void
    {
        $images = $this->form->getState()['image'] ?? null;

        if ($images) {
            if (is_array($images)) {
                foreach ($images as $image) {
                    if ($image instanceof UploadedFile) {
                        $this->record
                            ->addMedia($image)
                            ->toMediaCollection('images');
                    }
                }
            } elseif ($images instanceof UploadedFile) {
                $this->record
                    ->addMedia($images)
                    ->toMediaCollection('images');
            }
        }
    }

    protected function beforeDelete(): void
    {
        // Hapus relasi kategori di tabel pivot category_post
        $this->record->categories()->detach();

        // Hapus media dari koleksi 'images' jika ingin bersih total
        $this->record->clearMediaCollection('images');
    }
}
