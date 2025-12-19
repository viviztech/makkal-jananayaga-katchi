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
        Schema::table('members', function (Blueprint $table) {
            $table->string('member_no')->unique()->after('id');
            $table->string('place_type')->nullable()->after('assembly_id');
            $table->string('status')->default('pending')->nullable()->after('photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('member_no');
            $table->dropColumn('place_type');
            $table->dropColumn('status');
        });
    }
};
