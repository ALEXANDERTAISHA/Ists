<?php

namespace App\Http\Controllers;

use App\Support\PublicFile;
use Illuminate\Support\Facades\File;

class PublicMediaController extends Controller
{
    public function show(string $path)
    {
        $absolutePath = PublicFile::path($path);

        if (!$absolutePath) {
            abort(404);
        }

        $mimeType = File::mimeType($absolutePath) ?: 'application/octet-stream';

        return response()->file($absolutePath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($absolutePath) . '"',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
