<?php
require "vendor/autoload.php";
$app = require "bootstrap/app.php";
$app->make("Illuminate\Contracts\Console\Kernel")->bootstrap();
$updates = App\Models\Update::latest()->take(5)->get();
foreach($updates as $u){
    echo $u->id . " => image_path=[" . $u->image_path . "]\n";
    if($u->image_path){
        $fullPath = public_path('storage/' . $u->image_path);
        echo "   file_exists: " . (file_exists($fullPath) ? 'YES' : 'NO') . " at $fullPath\n";
    }
}
