<?php
namespace App\Http\Controllers\Traits;

trait FileUploadTrait
{
    public function upload($file, $file_path)
    {
        $extension = $file->getClientOriginalExtension();
        $sha = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."-".$sha.".".$extension;
        $path = public_path($file_path);
        $file->move($path, $filename);
        return $file_path.$filename;
    }
}
