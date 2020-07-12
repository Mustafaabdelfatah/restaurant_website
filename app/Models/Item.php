<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'price','image','description','category_id',''
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute(){

        return asset('backend/img/items/' . $this->image );
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
