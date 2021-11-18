<?php declare(strict_types=1);

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ImageUploadService
{
    public function imageUpload(UploadedFile $file, string $path = 'news'): string
    {

        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid("n_") . "." . $fileExtension;

        //file change
        if($filePath = $file->storeAs(Auth::id(), $fileName, $path)) {
            return $filePath;
        }

        throw new \Exception("File not uploaded");
    }

}