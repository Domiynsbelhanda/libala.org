<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CivilWedding extends Model
{
    protected $fillable = ['name', 'event_id', 'civil_template_id', 'date', 'time', 'venue', 'address', 'theme_title', 'theme_image'];
    protected $casts = ['date' => 'date'];

    protected static function booted(): void
    {
        static::creating(function ($wedding) {
            $wedding->reference ??= (string) Str::uuid();
        });
    }

    public function event() { return $this->belongsTo(Event::class); }
    public function template() { return $this->belongsTo(CivilTemplate::class, 'civil_template_id'); }
    public function guests() { return $this->hasMany(CivilGuest::class); }

    public function isReady(): bool
    {
        return $this->event !== null && $this->date !== null && filled($this->time) && filled($this->venue);
    }
}
