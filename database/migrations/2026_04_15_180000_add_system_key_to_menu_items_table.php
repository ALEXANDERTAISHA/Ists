<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->string('system_key')->nullable()->after('title')->index();
        });

        $mapping = [
            'ACERCA' => 'ACERCA',
            'ACADEMICOS' => 'ACADEMICOS',
            'CAMPUS' => 'CAMPUS',
            'TRANSPARENCIA' => 'TRANSPARENCIA',
            'NOTICIAS' => 'NOTICIAS',
            'DOCUMENTOS' => 'DOCUMENTOS',
            'DOCS' => 'DOCUMENTOS',
            'VISITAR' => 'VISITAR',
        ];

        DB::table('menu_items')
            ->whereNull('parent_id')
            ->orderBy('id')
            ->get()
            ->each(function ($item) use ($mapping) {
                $normalized = preg_replace('/[^A-Z]/', '', strtoupper(Str::ascii($item->title)));
                $systemKey = $mapping[$normalized] ?? null;

                if ($systemKey) {
                    DB::table('menu_items')
                        ->where('id', $item->id)
                        ->update(['system_key' => $systemKey]);
                }
            });
    }

    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropColumn('system_key');
        });
    }
};
