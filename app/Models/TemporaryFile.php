<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TemporaryFile extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'directory'];

    public function storeFiles($store_path)
    {
        if (!$this->isExists($this->directory)) abort(404);

        if (auth()->check()) {
            $oldImagePath = "/avatars/" . auth()->user()->getRawOriginal("avatar");
            Storage::delete($oldImagePath);
        }

        $newFile = hashing_file($this->filename);
        Storage::move($this->directory, $store_path . $newFile);
        $this->delete();

        return $newFile;
    }

    public function isExists($path)
    {
        return Storage::exists($path);
    }

    public function scopeFile($query, $filename)
    {
        return $query->where('filename', $filename)->firstOrFail();
    }
}
