<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'bride_name',
        'groom_name',
        'wedding_date',
        'church_name',
        'church_address',
        'church_date',
        'church_time',
        'civil_commune',
        'civil_date',
        'civil_time',
        'reception_hall',
        'reception_address',
        'reception_date',
        'reception_time',
        'theme',
        'manager_name',
        'manager_contact',
        'password',
        'couple_photo',
        'max_guests'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            // Génère un ID alphanumérique unique
            $event->reference = strtoupper(Str::random(10));

            // Hash du mot de passe (si non déjà hashé)
            if (!Hash::needsRehash($event->password)) {
                $event->password = bcrypt($event->password);
            }
        });
    }

    protected $hidden = ['password'];

    public function guests()
    {
        return $this->hasMany(\App\Models\Guest::class);
    }
}
