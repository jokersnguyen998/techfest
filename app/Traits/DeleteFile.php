<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait DeleteFile
{
    public function deleteFile($file)
    {
        return File::delete(public_path() . '/' . $file);
    }
}
