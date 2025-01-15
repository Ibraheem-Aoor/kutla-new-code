<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Photogallery extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','image','viewers','status','user_id'];

    public function galleryImages() : HasMany
    {
        return $this->hasMany(GalleryImage::class , 'photogallery_id');
    }

}
