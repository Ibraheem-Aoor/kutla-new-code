<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newscategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function newssubcategory()
    {
        return $this->belongsTo(Newssubcategory::class,'category_id');
    }

    public function newsSubCategories()
    {
        return $this->hasMany(Newssubcategory::class,'category_id','id');
    }
    public function news()
    {
        return $this->hasManyThrough(News::class,Newssubcategory::class,'category_id','subcategory_id','id','id')->where('status',1)->latest('id');
    }
    public function popularNews()
    {
        return $this->hasManyThrough(News::class,Newssubcategory::class,'category_id','subcategory_id','id','id')->orderByDesc('viewers');
    }



}
