<?php

namespace App\Traits;

trait UploadTrait 
{
    public function imageUpload($images, $path, $imageColumn = null)
    {
        $uploadedImages =[];

        if(is_array($images)) {
            foreach ($images as $image) {
                $uploadedImages[] = [$imageColumn = $image->store($path, 'public')]; 
            }
        } else {
            $uploadedImages = $images->store($path, 'public');
        }

        return $uploadedImages;
    }
}