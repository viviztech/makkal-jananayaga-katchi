<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('ebook_file_path')->nullable()->after('cover_image');
            $table->boolean('is_ebook')->default(false)->after('ebook_file_path');
            $table->boolean('is_ebook_available')->default(false)->after('is_ebook');
            $table->string('ebook_format')->nullable()->after('is_ebook_available'); // pdf, epub
            $table->boolean('has_text_content')->default(false)->after('ebook_format'); // For TTS capability
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn([
                'ebook_file_path',
                'is_ebook',
                'is_ebook_available',
                'ebook_format',
                'has_text_content'
            ]);
        });
    }
};
