<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemPdf extends Model
{
    use HasFactory;

    protected $fillable = ['menu_item_id', 'title', 'pdf_path'];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
