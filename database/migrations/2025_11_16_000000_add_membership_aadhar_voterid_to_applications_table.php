<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('membership_id')->nullable()->after('id');
            $table->string('aadhar_no')->nullable()->after('membership_id');
            $table->string('voterid_no')->nullable()->after('aadhar_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['membership_id', 'aadhar_no', 'voterid_no']);
        });
    }
};
