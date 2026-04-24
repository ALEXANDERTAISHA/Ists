<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_item_pdfs', function (Blueprint $table) {
            $table->text('main_description_2')->nullable()->after('main_description');
        });
    }

    public function down(): void
    {
        Schema::table('menu_item_pdfs', function (Blueprint $table) {
            $table->dropColumn('main_description_2');
        });
    }
};
