<?php
namespace App\Http\Traits;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;  // ✅ Use GD driver (or Imagick)

trait Upload
{
    public function makeDirectory($path)
    {
        if (file_exists($path)) return true;
        return mkdir($path, 0755, true);
    }

    public function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }

    public function uploadImage($file, $location, $size = null, $old = null, $thumb = null, $filename = null)
    {
        $path = $this->makeDirectory($location);
        if (!$path) throw new \Exception('File could not be created.');

        if (!empty($old)) {
            $this->removeFile($location . '/' . $old);
            $this->removeFile($location . '/thumb_' . $old);
        }

        if ($filename == null) {
            $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
        }

        // ✅ FIXED: Use ImageManager correctly
        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read($file); // ✅ Use `read()` instead of `make()`

        if (!empty($size)) {
            $size = explode('x', strtolower($size));
            $image->scale(width: (int)$size[0], height: (int)$size[1]); // ✅ Use `scale()`
        }
        $image->save($location . '/' . $filename);

        if (!empty($thumb)) {
            $thumb = explode('x', $thumb);
            $thumbImage = $imageManager->read($file);
            $thumbImage->scale(width: (int)$thumb[0], height: (int)$thumb[1])
                       ->save($location . '/thumb_' . $filename);
        }
        return $filename;
    }
}

