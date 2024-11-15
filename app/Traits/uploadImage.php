<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;


trait uploadImage
{
    public function uploadImage($image)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 246)->save('upload/post/' . $name_gen);
        $save_url = 'upload/post/' . $name_gen;
        return $save_url;
    }
    public function uploadFeaturedImage($image)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 600)->save('upload/post/post-featured-image/' . $name_gen);
        $save_url = 'upload/post/post-featured-image/' . $name_gen;
        return $save_url;
    }
    public function uploadPostImages($image)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1200, 628)->save('upload/post/post-multi-images/' . $name_gen);
        $save_url = 'upload/post/post-multi-images/' . $name_gen;
        return $save_url;
    }
    public function uploadPageFeaturedImage($image)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 246)->save('upload/page-featured-image/' . $name_gen);
        $save_url = 'upload/page-featured-image/' . $name_gen;
        return $save_url;
    }
    public function UploadLogo($image)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(250, 400)->save('upload/logo/' . $name_gen);
        $save_url = 'upload/logo/' . $name_gen;
        return $save_url;
    }
    public function uploadAdImage($image)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(250, 400)->save('upload/AdImage/' . $name_gen);
        $save_url = 'upload/AdImage/' . $name_gen;
        return $save_url;
    }
}
