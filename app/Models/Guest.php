<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'name', 'phone'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
