<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Good extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_title',
        'image_path',
        'is_published',
        'ordered',
    ];

    public function getImageUrlAttribute()
    {
        // http://127.0.0.8000/ - url
        // storage::url ->>> /storage/public/images/dwdfewfew.fewrfe.png
        // console -- php artisan storage:link --
        return url(Storage::url($this->image_path));
    }
}
