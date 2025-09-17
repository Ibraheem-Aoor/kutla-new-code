<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Str;

class News extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    protected static function boot()
    {
        parent::boot();

        static::created( function($news) {
            $news->shortlink = Str::random(6).$news->id;
            $news->save();
        });
    }
    public function subCategories()
    {
        return $this->belongsTo(Newssubcategory::class,'subcategory_id');
    }

    public function comments()
    {
        return $this->hasMany(Newscomment::class,'news_id');
    }

    public function category()
    {
        return $this->hasOneThrough(Newscategory::class,Newssubcategory::class,'id','id','subcategory_id','category_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class,'reporter_id','id');
    }

}
