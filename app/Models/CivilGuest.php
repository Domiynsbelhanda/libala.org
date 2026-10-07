<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CivilGuest extends Model
{
    protected $fillable = ['civil_wedding_id', 'name', 'phone'];

    protected static function booted(): void
    {
        static::creating(function ($guest) { $guest->code = Str::random(40); });
    }

    public function wedding() { return $this->belongsTo(CivilWedding::class, 'civil_wedding_id'); }

    public function invitationUrl(): string
    {
        return route('civil.invitation', [
            'reference' => $this->wedding->reference,
            'code' => $this->code,
            'v' => app(\App\Services\CivilInvitationImage::class)->version($this->wedding, $this),
        ]);
    }

    public function shareText(): string
    {
        $wedding = $this->wedding;
        $event = $wedding->event;
        return "Invitation au mariage civil de {$event->groom_name} & {$event->bride_name}\n\n"
            . "À l’attention de : {$this->name}\n"
            . $wedding->date->locale('fr')->translatedFormat('l d F Y') . ' à ' . substr($wedding->time, 0, 5) . "\n"
            . $wedding->venue . ($wedding->address ? "\n{$wedding->address}" : '')
            . "\n\nNous serions heureux de vous avoir à nos côtés.\n" . $this->invitationUrl();
    }

    public function whatsappUrl(): string
    {
        $phone = preg_replace('/\D/', '', $this->phone ?? '');
        if (str_starts_with($phone, '00')) $phone = substr($phone, 2);
        return 'https://wa.me/' . $phone . '?text=' . rawurlencode($this->shareText());
    }
}
