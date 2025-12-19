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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('assembly_id')->nullable()->constrained();
            $table->foreignId('block_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->foreignId('perur_id')->nullable()->constrained();
            $table->foreignId('paguthi_id')->nullable()->constrained();
            $table->foreignId('vattam_id')->nullable()->constrained();
            $table->foreignId('postingstage_id')->nullable()->constrained();
            $table->foreignId('subbody_id')->nullable()->constrained();
            $table->foreignId('post_id')->nullable()->constrained();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('social_category')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('current_post')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_id')->unique()->nullable();
            $table->string('document')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->default('Pending');
            $table->string('selected_postingstage')->nullable();
            $table->string('selected_subbody')->nullable();
            $table->string('selected_post')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
