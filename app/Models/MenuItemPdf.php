<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_item_id',
        'title',
        'pdf_path',
        'main_description',
        'main_description_2',
        'main_image_path',
        'description',
        'is_active'
    ];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
