<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'event_id',
    ];

    public function guestTables()
    {
        return $this->hasMany(\App\Models\GuestTable::class);
    }
}
