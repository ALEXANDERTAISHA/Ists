<?php

Route::get('debug/hero-slides', function() {
    $slides = \App\Models\HeroSlide::where('is_active', true)
        ->whereNotNull('image_path')
        ->orderBy('sort_order')
        ->get()
        ->map(function($s) {
            return [
                'id' => $s->id,
                'title' => $s->title,
                'image_path' => $s->image_path,
                'image_url' => $s->image_url,
                'exists_in_storage' => file_exists(storage_path('app/public/' . $s->image_path)),
                'exists_in_symlink' => file_exists(public_path('storage/' . $s->image_path)),
            ];
        });

    return response()->json([
        'count' => $slides->count(),
        'slides' => $slides,
        'app_url' => config('app.url'),
        'storage_path' => storage_path('app/public'),
        'public_path' => public_path(),
    ]);
});
