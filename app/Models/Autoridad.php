<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Autoridad extends Model
{
    use HasFactory;

    protected $table = "autoridades";

    protected $fillable = [
        "nombre",
        "slug",
        "cargo",
        "categoria",
        "biografia",
        "foto_path",
        "pdf_path",
        "orden",
    ];

    protected $appends = [
        "foto_url",
        "pdf_url",
    ];

    public function getFotoUrlAttribute(): ?string
    {
        return $this->publicFileUrl($this->foto_path, "uploads/images");
    }

    public function getPdfUrlAttribute(): ?string
    {
        if (empty($this->pdf_path)) {
            return null;
        }

        return route("autoridades.curriculum", $this);
    }

    public function pdfAbsolutePath(): ?string
    {
        return $this->absoluteFilePath($this->pdf_path, "uploads/pdfs");
    }

    protected function publicFileUrl(?string $value, ?string $legacyDirectory = null): ?string
    {
        if (empty($value)) {
            return null;
        }

        $path = ltrim((string) $value, "/");

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        if (str_starts_with($path, "storage/")) {
            return asset($path);
        }

        if (file_exists(public_path($path))) {
            return asset($path);
        }

        if ($legacyDirectory && file_exists(public_path($legacyDirectory . "/" . $path))) {
            return asset($legacyDirectory . "/" . $path);
        }

        if (Storage::disk("public")->exists($path)) {
            return asset("storage/" . $path);
        }

        return $legacyDirectory
            ? asset($legacyDirectory . "/" . $path)
            : asset($path);
    }

    protected function absoluteFilePath(?string $value, ?string $legacyDirectory = null): ?string
    {
        if (empty($value)) {
            return null;
        }

        $path = ltrim((string) $value, "/");

        if (str_starts_with($path, "storage/")) {
            $path = substr($path, strlen("storage/"));
        }

        if (Storage::disk("public")->exists($path)) {
            return Storage::disk("public")->path($path);
        }

        if (file_exists(public_path($path))) {
            return public_path($path);
        }

        if ($legacyDirectory && file_exists(public_path($legacyDirectory . "/" . $path))) {
            return public_path($legacyDirectory . "/" . $path);
        }

        return null;
    }
}
