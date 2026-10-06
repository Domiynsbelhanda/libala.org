<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WeddingShareImage
{
    public const WIDTH = 1200;
    public const HEIGHT = 630;

    public function url(?Event $event = null): string
    {
        return $event?->reference
            ? route('event.share-image', ['reference' => $event->reference, 'v' => $this->version($event)])
            : route('share-image.default');
    }

    public function version(?Event $event = null): string
    {
        $source = $this->source($event);

        return substr(hash('sha256', 'wedding-share-v1|' . $source . '|' . hash_file('sha256', $source)), 0, 20);
    }

    public function path(?Event $event = null): string
    {
        $source = $this->source($event);
        $directory = config('sharing.cache_path', storage_path('app/share-previews'));
        $path = $directory . '/' . $this->version($event) . '.jpg';
        if (is_file($path)) {
            return $path;
        }

        File::ensureDirectoryExists($directory);
        $canvas = imagecreatetruecolor(self::WIDTH, self::HEIGHT);
        $ivory = imagecolorallocate($canvas, 252, 249, 242);
        imagefill($canvas, 0, 0, $ivory);
        $gold = imagecolorallocate($canvas, 220, 212, 191);
        imagerectangle($canvas, 16, 16, 1183, 613, $gold);

        $flower = imagecreatefrompng($this->fallback());
        imagecopyresampled($canvas, $flower, 22, 28, 0, 0, 410, 418, imagesx($flower), imagesy($flower));
        imageflip($flower, IMG_FLIP_BOTH);
        imagecopyresampled($canvas, $flower, 768, 184, 0, 0, 410, 418, imagesx($flower), imagesy($flower));
        imagedestroy($flower);

        if ($source !== $this->fallback()) {
            $photo = @imagecreatefromstring(file_get_contents($source));
            if ($photo !== false) {
                $photo = $this->orient($photo, $source);
                // Fit the whole photograph: no cropped faces or distorted proportions.
                $scale = min(1128 / imagesx($photo), 582 / imagesy($photo));
                $width = (int) round(imagesx($photo) * $scale);
                $height = (int) round(imagesy($photo) * $scale);
                $x = (int) ((self::WIDTH - $width) / 2);
                $y = (int) ((self::HEIGHT - $height) / 2);
                imagefilledrectangle($canvas, $x - 8, $y - 8, $x + $width + 8, $y + $height + 8, $ivory);
                imagecopyresampled($canvas, $photo, $x, $y, 0, 0, $width, $height, imagesx($photo), imagesy($photo));
                imagedestroy($photo);
            }
        }

        $temporary = tempnam($directory, 'preview-');
        try {
            imagejpeg($canvas, $temporary, 85);
            rename($temporary, $path);
        } finally {
            imagedestroy($canvas);
            if (is_file($temporary)) {
                unlink($temporary);
            }
        }

        return $path;
    }

    private function source(?Event $event): string
    {
        $candidates = [$event?->couple_photo, $event?->w_image, ...($event?->gallery ?? [])];
        $roots = [Storage::disk('public')->path(''), storage_path('app')];
        foreach ($candidates as $candidate) {
            if (!is_string($candidate) || $candidate === '') {
                continue;
            }
            foreach ($roots as $root) {
                $base = $root ? realpath($root) : false;
                $path = $base ? realpath($base . '/' . $candidate) : false;
                if (!$path || !str_starts_with($path, $base . DIRECTORY_SEPARATOR) || !is_file($path) || !is_readable($path)) {
                    continue;
                }
                if (filesize($path) > 20 * 1024 * 1024) {
                    continue;
                }
                $size = @getimagesize($path);
                if ($size && $size[0] > 0 && $size[1] > 0 && $size[0] * $size[1] <= 16000000
                    && in_array($size[2], [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP, IMAGETYPE_GIF], true)) {
                    return $path;
                }
            }
        }

        return $this->fallback();
    }

    private function fallback(): string
    {
        return public_path('template2/images/slider/invitation-shape-1.png');
    }

    private function orient(\GdImage $image, string $path): \GdImage
    {
        $exif = function_exists('exif_read_data') ? @exif_read_data($path) : false;
        $orientation = (int) ($exif['Orientation'] ?? 1);
        if (in_array($orientation, [2, 4, 5, 7], true)) {
            imageflip($image, IMG_FLIP_HORIZONTAL);
        }
        $angle = match ($orientation) {
            3, 4 => 180,
            5, 6 => -90,
            7, 8 => 90,
            default => 0,
        };
        if ($angle) {
            $rotated = imagerotate($image, $angle, 0);
            imagedestroy($image);
            return $rotated;
        }

        return $image;
    }
}
