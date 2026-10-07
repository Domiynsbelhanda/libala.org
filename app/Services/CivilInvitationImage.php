<?php
namespace App\Services;

use App\Models\CivilGuest;
use App\Models\CivilWedding;
use Illuminate\Support\Facades\File;

class CivilInvitationImage
{
    public function version(CivilWedding $wedding, CivilGuest $guest): string
    {
        return substr(hash('sha256', json_encode([
            'civil-ambre-photo-v2', $this->photoVersion($wedding), $wedding->only(['name', 'date', 'time', 'venue', 'address', 'civil_template_id']),
            $wedding->event?->only(['groom_name', 'bride_name']), $guest->name,
        ], JSON_UNESCAPED_UNICODE)), 0, 20);
    }

    public function path(CivilWedding $wedding, CivilGuest $guest): string
    {
        $directory = config('sharing.civil_cache_path', storage_path('app/civil-previews'));
        File::ensureDirectoryExists($directory);
        $path = $directory . '/' . $this->version($wedding, $guest) . '.jpg';
        if (is_file($path)) return $path;

        $image = imagecreatefromstring(file_get_contents($this->scenePath($wedding)));
        $hasPhoto = $this->photoSource($wedding) !== null;
        $ink = imagecolorallocate($image, 66, 29, 14);
        $amber = imagecolorallocate($image, 143, 66, 30);
        $serif = public_path('templates/civil-ambre/fonts/CormorantGaramond.ttf');
        $script = public_path('templates/civil-ambre/fonts/GreatVibes-Regular.ttf');
        $this->text($image, 'LE BONHEUR DE SE DIRE OUI', 22, $hasPhoto ? 675 : 340, $serif, $amber);
        $this->text($image, 'Mariage civil', 48, $hasPhoto ? 740 : 425, $serif, $ink);
        $this->text($image, $wedding->event->groom_name . ' & ' . $wedding->event->bride_name, 55, $hasPhoto ? 815 : 525, $script, $ink);
        $ruleY = $hasPhoto ? 850 : 570;
        imageline($image, 430, $ruleY, 570, $ruleY, $amber);
        $this->text($image, 'Invitation de :', 30, $hasPhoto ? 895 : 635, $script, $amber);
        $this->wrapped($image, $guest->name, 34, $hasPhoto ? 945 : 695, $serif, $ink, 2);
        $date = $wedding->date->locale('fr');
        $this->text($image, mb_strtoupper($date->translatedFormat('l')), 20, $hasPhoto ? 1015 : 795, $serif, $amber);
        $this->text($image, $date->translatedFormat('d F Y') . '  ·  ' . substr($wedding->time, 0, 5), 30, $hasPhoto ? 1060 : 850, $serif, $ink);
        $this->wrapped($image, $wedding->venue, 27, $hasPhoto ? 1110 : 925, $serif, $ink, 2, $hasPhoto ? 440 : 650);
        if ($wedding->address) $this->wrapped($image, $wedding->address, 20, $hasPhoto ? 1170 : 1005, $serif, $ink, 2, $hasPhoto ? 410 : 650);
        $temporary = tempnam($directory, 'civil-');
        try {
            imagejpeg($image, $temporary, 88);
            rename($temporary, $path);
        } finally {
            imagedestroy($image);
            if (is_file($temporary)) unlink($temporary);
        }
        return $path;
    }

    public function photoSource(CivilWedding $wedding): ?string
    {
        return $wedding->getAttribute('is_design_preview')
            ? public_path('core/images/couple-1.jpg')
            : app(WeddingShareImage::class)->photoSource($wedding->event);
    }

    public function photoVersion(CivilWedding $wedding): string
    {
        $source = $this->photoSource($wedding);
        return hash('sha256', 'civil-scene-v3|' . ($source ? hash_file('sha256', $source) : 'no-photo'));
    }

    public function photoPath(CivilWedding $wedding): string
    {
        $source = $this->photoSource($wedding);
        abort_unless($source, 404);
        $directory = config('sharing.civil_cache_path', storage_path('app/civil-previews'));
        File::ensureDirectoryExists($directory);
        $path = $directory . '/photo-' . $this->photoVersion($wedding) . '.jpg';
        if (is_file($path)) return $path;
        $image = app(WeddingShareImage::class)->orient(imagecreatefromstring(file_get_contents($source)), $source);
        $temporary = tempnam($directory, 'photo-');
        try {
            imagejpeg($image, $temporary, 90);
            rename($temporary, $path);
        } finally {
            imagedestroy($image);
            if (is_file($temporary)) unlink($temporary);
        }
        return $path;
    }

    public function scenePath(CivilWedding $wedding): string
    {
        $source = $this->photoSource($wedding);
        $directory = config('sharing.civil_cache_path', storage_path('app/civil-previews'));
        File::ensureDirectoryExists($directory);
        $path = $directory . '/scene-' . $this->photoVersion($wedding) . '.jpg';
        if (is_file($path)) return $path;
        if (!$source) {
            $background = imagecreatefrompng(public_path('templates/civil-ambre/background.png'));
            $image = imagecreatetruecolor(1000, 1500);
            imagecopyresampled($image, $background, 0, 0, 0, 0, 1000, 1500, imagesx($background), imagesy($background));
            imagedestroy($background);
            $temporary = tempnam($directory, 'scene-');
            try {
                imagejpeg($image, $temporary, 90);
                rename($temporary, $path);
            } finally {
                imagedestroy($image);
                if (is_file($temporary)) unlink($temporary);
            }
            return $path;
        }
        $photo = imagecreatefromstring(file_get_contents($source));
        $photo = app(WeddingShareImage::class)->orient($photo, $source);
        $image = imagecreatetruecolor(1000, 1500);
        imagefill($image, 0, 0, imagecolorallocate($image, 239, 217, 185));
        // Fill the upper window, preserving proportions and prioritizing faces near the top.
        $scale = max(1000 / imagesx($photo), 1020 / imagesy($photo));
        $width = (int) round(imagesx($photo) * $scale);
        $height = (int) round(imagesy($photo) * $scale);
        imagecopyresampled($image, $photo, (int) ((1000 - $width) / 2), (int) ((1020 - $height) * .2), 0, 0, $width, $height, imagesx($photo), imagesy($photo));
        imagedestroy($photo);
        // Ivory fades in gradually; shadows stay above the photograph.
        for ($y = 0; $y < 1500; $y++) {
            $opacity = max(0, min(1, ($y - 510) / 330));
            $opacity = $opacity * $opacity * (3 - 2 * $opacity);
            $color = imagecolorallocatealpha($image, 239, 217, 185, (int) round(127 * (1 - $opacity)));
            imageline($image, 0, $y, 999, $y, $color);
        }
        $frame = imagecreatefrompng(public_path('templates/civil-ambre/frame.png'));
        imagecopyresampled($image, $frame, 0, -150, 0, 0, 1000, 1650, imagesx($frame), imagesy($frame));
        imagedestroy($frame);
        $temporary = tempnam($directory, 'scene-');
        try {
            imagejpeg($image, $temporary, 90);
            rename($temporary, $path);
        } finally {
            imagedestroy($image);
            if (is_file($temporary)) unlink($temporary);
        }
        return $path;
    }

    private function width(string $text, float $size, string $font): float
    {
        $box = imagettfbbox($size, 0, $font, $text);
        return max($box[0], $box[2], $box[4], $box[6]) - min($box[0], $box[2], $box[4], $box[6]);
    }

    private function text($image, string $text, float $size, int $y, string $font, int $color, int $maxWidth = 650): void
    {
        while ($this->width($text, $size, $font) > $maxWidth && $size > 8) $size -= 1;
        $box = imagettfbbox($size, 0, $font, $text);
        $x = (int) ((1000 - $this->width($text, $size, $font)) / 2 - min($box[0], $box[2], $box[4], $box[6]));
        imagettftext($image, $size, 0, $x, $y, $color, $font, $text);
    }

    private function wrapped($image, string $text, float $size, int $y, string $font, int $color, int $limit, int $maxWidth = 650): void
    {
        do {
            $lines = [''];
            foreach (preg_split('/\s+/u', trim($text)) as $word) {
                $i = count($lines) - 1;
                $next = trim($lines[$i] . ' ' . $word);
                if ($lines[$i] !== '' && $this->width($next, $size, $font) > $maxWidth) $lines[] = $word;
                else $lines[$i] = $next;
            }
            if (count($lines) <= $limit || $size <= 10) break;
            $size--;
        } while (true);
        foreach ($lines as $i => $line) $this->text($image, $line, $size, $y + (int) ($i * $size * 1.45), $font, $color, $maxWidth);
    }
}
