<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photogallery extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','image','viewers','status','user_id'];

}
