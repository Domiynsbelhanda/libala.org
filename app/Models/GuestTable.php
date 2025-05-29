<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestTable extends Model
{
    use HasFactory;

    protected $table = 'guest_table';

    protected $fillable = ['event_id', 'guest_id', 'table_id', 'code'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

}
