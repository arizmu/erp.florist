<?php

use Illuminate\Support\Facades\Storage;

function FileUpload($fileRequst, $basePath, $fileName)
{
    try {
        $file = $fileRequst;
        $fileExt = $file->getClientOriginalExtension();
        $file_name = $fileName . "." . $fileExt;
        $basePath = $basePath;
        $filePath = $basePath . $file_name;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        Storage::putFileAs($basePath, $file, $file_name);
        return Storage::url($filePath);

    } catch (\Throwable $th) {
        return "";
    }
}
