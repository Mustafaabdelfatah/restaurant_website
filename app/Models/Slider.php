<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'sub_title','image'
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute(){

        return asset('backend/img/slider/' . $this->image );
    }
}
