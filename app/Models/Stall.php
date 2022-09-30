<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stall extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'video_path',
        'stall_image_path',
        'logo',
        'standy',
        'description',
        'contact',
        'position',
    ];

    protected $casts = [];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
