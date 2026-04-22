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
        return $this->children()->with('childrenRecursive');
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function pdfs()
    {
        return $this->hasMany(MenuItemPdf::class);
    }
}
