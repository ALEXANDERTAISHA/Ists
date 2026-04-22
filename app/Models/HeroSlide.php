<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HeroSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image_path',
        'link',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $appends = ['image_url'];

    /**
     * Scope para obtener solo slides activos
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope para ordenar por sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    public function getImageUrlAttribute()
    {
        if (empty($this->image_path)) {
            return null;
        }

        $path = ltrim($this->image_path, '/');

        // Si es URL externa, devolverla tal cual
        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        // Si la ruta incluye 'uploads/images/', es del storage (nuevo sistema)
        if (Str::startsWith($path, 'uploads/images/')) {
            // Verificar que el archivo existe en public/storage
            if (file_exists(public_path('storage/' . $path))) {
                return url('storage/' . $path);
            }
            // Fallback: directamente en public
            if (file_exists(public_path($path))) {
                return url($path);
            }
            return url('storage/' . $path);
        }

        // Buscar en ubicaciones locales (antiguo sistema con solo filename)
        $candidates = [
            [$path, public_path($path)],
            ['uploads/images/' . $path, public_path('uploads/images/' . $path)],
            ['storage/' . $path, public_path('storage/' . $path)],
        ];

        foreach ($candidates as [$urlPath, $absolutePath]) {
            if (file_exists($absolutePath)) {
                return url($urlPath);
            }
        }

        // Por defecto, asumir que está en storage
        return url('storage/' . $path);
    }
}
