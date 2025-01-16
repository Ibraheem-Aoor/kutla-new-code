<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogallery extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','video','video_source','video_option','status','user_id' , 'image'];
}
