<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageUpload
{
    public static function upload($file, $path = null, $filename = null)
    {

        if($path){

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if ($filename == null) {
                $filename = str_slug(explode(".", $file->getClientOriginalName())[0]);
                $path = $path . time() . "_" .  $filename . '.webp';
            } else {
                $path = $path .'/'. $filename . '.webp';

            }
            // Intervention
            Image::make($file)->encode('webp', 60)->save(($path));
            return $path;
        }else{
            $dateStr = date("Y/m/d/");
            $timeStamp = time();
            $filename = str_slug(explode(".", $file->getClientOriginalName())[0]);
            foreach(config('constants.images') as $image_category => $dimension){

                if (!file_exists("uploads/$image_category/".$dateStr)) {
                    mkdir("uploads/$image_category/".$dateStr, 0777, true);
                }



                Image::make($file)->resize($dimension['width'], $dimension['height'], function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp')->save(("uploads/$image_category/".$dateStr. $timeStamp . "_" .  $filename . '.webp'),$dimension['quality']);
            };
            return $dateStr.$timeStamp."_".$filename.".webp";
        }
    }
}


