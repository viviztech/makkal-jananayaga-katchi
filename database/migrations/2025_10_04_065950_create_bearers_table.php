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
        Schema::create('bearers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->foreignId('assembly_id')->constrained('assemblies')->onDelete('cascade');
            $table->string('name_ta');
            $table->string('name_en');
            $table->longText('content_ta')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('slug')->unique();
            $table->string('photo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('x')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bearers');
    }
};
