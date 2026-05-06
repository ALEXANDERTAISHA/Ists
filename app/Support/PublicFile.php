<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class PublicFile
{
    public static function url(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        $path = self::normalize($value);

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        if (!self::isSafePath($path)) {
            return null;
        }

        $segments = array_map('rawurlencode', explode('/', $path));

        return url('/media/' . implode('/', $segments));
    }

    public static function path(?string $value): ?string
    {
        if (blank($value) || filter_var($value, FILTER_VALIDATE_URL)) {
            return null;
        }

        $path = self::normalize($value);

        if (!self::isSafePath($path)) {
            return null;
        }

        $storagePath = self::withoutStoragePrefix($path);

        if (Storage::disk('public')->exists($storagePath)) {
            return Storage::disk('public')->path($storagePath);
        }

        $publicCandidates = [
            public_path($path),
            public_path('storage/' . $storagePath),
            public_path($storagePath),
        ];

        if (!str_starts_with($path, 'uploads/')) {
            $publicCandidates[] = public_path('uploads/images/' . $path);
            $publicCandidates[] = public_path('uploads/pdfs/' . $path);
            $publicCandidates[] = public_path('uploads/videos/' . $path);
            $publicCandidates[] = public_path('uploads/documents/' . $path);
        }

        foreach (array_unique($publicCandidates) as $candidate) {
            if (is_file($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    public static function delete(?string $value): void
    {
        if (blank($value) || filter_var($value, FILTER_VALIDATE_URL)) {
            return;
        }

        $path = self::normalize($value);

        if (!self::isSafePath($path)) {
            return;
        }

        $storagePath = self::withoutStoragePrefix($path);

        if (Storage::disk('public')->exists($storagePath)) {
            Storage::disk('public')->delete($storagePath);
            return;
        }

        $absolutePath = self::path($path);

        if ($absolutePath && is_file($absolutePath)) {
            unlink($absolutePath);
        }
    }

    public static function normalize(string $value): string
    {
        $path = str_replace('\\', '/', trim($value));
        $path = ltrim($path, '/');

        return str_starts_with($path, 'public/storage/')
            ? substr($path, strlen('public/'))
            : $path;
    }

    public static function withoutStoragePrefix(string $path): string
    {
        return str_starts_with($path, 'storage/')
            ? substr($path, strlen('storage/'))
            : $path;
    }

    public static function isSafePath(string $path): bool
    {
        $segments = explode('/', $path);

        return !in_array('..', $segments, true);
    }
}
