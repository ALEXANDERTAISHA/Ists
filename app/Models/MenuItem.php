<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category', 'system_key', 'url', 'pdf_file', 'parent_id', 'career_id', 'order', 'is_active'];

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order');
    }

    public function childrenRecursive()
    {
        return $this->children()->with(['childrenRecursive', 'pdfs']);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function pdfs()
    {
        return $this->hasMany(MenuItemPdf::class);
    }

    public function hasOwnVisiblePdfDocuments(): bool
    {
        return $this->pdfs->contains(function ($pdf) {
            return (bool) $pdf->is_active && filled($pdf->pdf_path);
        });
    }

    public function hasOwnDesignPresentation(): bool
    {
        return $this->pdfs->contains(function ($pdf) {
            return (bool) $pdf->is_active && (
                filled($pdf->pdf_path) ||
                filled($pdf->main_description) ||
                filled($pdf->main_description_2) ||
                filled($pdf->main_image_path)
            );
        });
    }

    public function hasBrowsableDesignContent(): bool
    {
        if ($this->hasOwnDesignPresentation()) {
            return true;
        }

        $children = $this->relationLoaded('childrenRecursive') ? $this->childrenRecursive : $this->children;

        foreach ($children as $child) {
            if ($child->hasBrowsableDesignContent()) {
                return true;
            }
        }

        return false;
    }

    public function visiblePdfCountRecursive(): int
    {
        $count = $this->pdfs->filter(function ($pdf) {
            return (bool) $pdf->is_active && filled($pdf->pdf_path);
        })->count();

        $children = $this->relationLoaded('childrenRecursive') ? $this->childrenRecursive : $this->children;

        foreach ($children as $child) {
            $count += $child->visiblePdfCountRecursive();
        }

        return $count;
    }
}
