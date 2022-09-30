<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFile
{
    public function uploadFile($file, $folder)
    {
        $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs("public/$folder", $fileNameHash);
        return Storage::url($filePath);
    }
}
