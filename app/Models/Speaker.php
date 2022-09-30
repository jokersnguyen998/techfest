<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'work_place',
        'avatar',
        'sex',
        'submit_id',
    ];

    public function submits()
    {
        return $this->belongsToMany(Submit::class, Discussion::class)->withPivot('name');
    }

    public function getSexAttribute($value)
    {
        return $value ? 'Ông' : 'Bà';
    }
}
