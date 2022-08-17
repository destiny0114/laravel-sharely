<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Mediable
{
    public function storeImage(UploadedFile $file, string $directory, string $type)
    {
        $image_path = $file->store($directory);

        $media = new Media([
            'url' => $image_path,
            'file_path' => $image_path,
            'type' => $type,
        ]);

        $image = $this->findImageType($type);

        if ($image) {
            Storage::delete($image->file_path);
            return $image->update($media->getAttributes());
        }
        return $this->images()->save($media);
    }

    protected function filterImage(string $type)
    {
        $image = $this->findImageType($type);
        return $image ? $image->url : null;
    }

    protected function findImageType(string $type)
    {
        return $this->images()->where('type', $type)->first();
    }
}
