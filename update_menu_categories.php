<?php

require __DIR__ . '/vendor/autoload.php';
use Illuminate\Contracts\Console\Kernel;

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;

$map = [
    'CARRERAS' => 'carreras',
    'CAMPUS' => 'servicios',
    'TRANSPARENCIA' => 'transparency',
    'VISITAR' => 'visitar',
    'ACERCA' => 'sobre-nosotros',
    'DOCUMENTOS' => 'documentos',
    'NOTICIAS' => 'noticias',
    'UNIDADES' => 'unidades',
    'INVESTIGACIÓN' => 'investigacion',
    'VINCULACIÓN' => 'vinculacion',
];

foreach ($map as $title => $category) {
    MenuItem::where('title', $title)->update(['category' => $category]);
}

echo "Categorías de menús actualizadas.\n";
