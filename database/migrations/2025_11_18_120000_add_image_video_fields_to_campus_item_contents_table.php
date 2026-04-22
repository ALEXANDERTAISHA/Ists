<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('campus_item_contents', function (Blueprint $table) {
            if (!Schema::hasColumn('campus_item_contents', 'image_url')) {
                $table->string('image_url')->nullable()->after('pdf_url');
            }
            if (!Schema::hasColumn('campus_item_contents', 'image_path')) {
                $table->string('image_path')->nullable()->after('image_url');
            }
            if (!Schema::hasColumn('campus_item_contents', 'video_url')) {
                $table->string('video_url')->nullable()->after('image_path');
            }
            if (!Schema::hasColumn('campus_item_contents', 'video_path')) {
                $table->string('video_path')->nullable()->after('video_url');
            }
        });
    }
    public function down() {
        $existing = [];
        foreach (['image_url', 'image_path', 'video_url', 'video_path'] as $column) {
            if (Schema::hasColumn('campus_item_contents', $column)) {
                $existing[] = $column;
            }
        }

        if (!empty($existing)) {
            Schema::table('campus_item_contents', function (Blueprint $table) use ($existing) {
                $table->dropColumn($existing);
            });
        }
    }
};
