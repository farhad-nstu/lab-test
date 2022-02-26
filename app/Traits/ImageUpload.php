<?php
namespace App\Traits;

trait ImageUpload{

    //this function is for upload image
    public function image($image,$directory){
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $image_url= $image->move(($directory.'/'), $image_name);
        return $image_name;
    }

    // Multiple Image //
    public function multiple_image($image, $directory, $si){
        $image_name = time().$si.'.'.$image->getClientOriginalExtension();
        $image_url= $image->move(($directory.'/'), $image_name);
        return $image_name;
    }
}
