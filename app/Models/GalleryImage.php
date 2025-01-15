<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'photogallery_id',
        'image',
    ];

    public function photoGallery(): BelongsTo
    {
        return $this->belongsTo(Photogallery::class);
    }
}
