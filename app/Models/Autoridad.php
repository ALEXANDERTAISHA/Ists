<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function getFotoUrlAttribute(): ?string
    {
        if (empty($this->foto_path)) {
            return null;
        }

        $path = ltrim((string) $this->foto_path, "/");

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        if (str_starts_with($path, "uploads/") || str_starts_with($path, "storage/")) {
            return asset($path);
        }

        if (file_exists(public_path("uploads/images/" . $path))) {
            return asset("uploads/images/" . $path);
        }

        return asset("storage/uploads/images/" . $path);
    }
}
