<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Features;

trait HasSgcFile
{
    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultPhotoUrl($type)
    {
        if($type == 'front'){
            return asset('storage/vehicle/default/front.jpg');
        }else if($type == 'back'){
            return asset('storage/vehicle/default/back.jpg');
        }else if($type == 'left'){
            return asset('storage/vehicle/default/left.jpg');
        }else if($type == 'right'){
            return asset('storage/vehicle/default/right.jpg');
        }
    }

    /************* Vehicles Photos **********************************/
    public function getFrontPhotoUrlAttribute()
    {
        return $this->front_photo_path
                ? Storage::disk($this->profilePhotoDisk())->url($this->front_photo_path)
                : $this->defaultPhotoUrl('front');
    }

    public function getBackPhotoUrlAttribute()
    {
        return $this->back_photo_path
                ? Storage::disk($this->profilePhotoDisk())->url($this->back_photo_path)
                : $this->defaultPhotoUrl('back');
    }

    public function getLeftPhotoUrlAttribute()
    {
        return $this->left_photo_path
                ? Storage::disk($this->profilePhotoDisk())->url($this->left_photo_path)
                : $this->defaultPhotoUrl('left');
    }

    public function getRightPhotoUrlAttribute()
    {
        return $this->right_photo_path
                ? Storage::disk($this->profilePhotoDisk())->url($this->right_photo_path)
                : $this->defaultPhotoUrl('right');
    }
    /************* End Vehicles Photos *******************************/

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}