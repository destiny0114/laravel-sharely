<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "avatar" => "required|image|mimes:jpg,png"
        ]);

        $file = $request->file('avatar');
        $filename = $file->hashName();
        $path = $file->storeAs('tmp', $filename);

        TemporaryFile::create([
            'filename' => $filename,
            'directory' => $path
        ]);

        return $filename;
    }
}
