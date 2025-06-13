<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'blade_path', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = (string) Str::uuid();
        });
    }
}
