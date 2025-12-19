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
        Schema::table('applications', function (Blueprint $table) {
            $table->string('workflow_status')->default('draft')->after('status'); // draft, preview, payment_pending, completed
            $table->decimal('application_fee', 10, 2)->nullable()->after('workflow_status');
            $table->string('payment_method')->nullable()->after('application_fee'); // online, offline, upi
            $table->string('payment_transaction_id')->nullable()->after('payment_method');
            $table->string('payment_status')->default('pending')->after('payment_transaction_id'); // pending, completed, failed
            $table->timestamp('payment_completed_at')->nullable()->after('payment_status');
            $table->text('payment_receipt_url')->nullable()->after('payment_completed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'workflow_status',
                'application_fee',
                'payment_method',
                'payment_transaction_id',
                'payment_status',
                'payment_completed_at',
                'payment_receipt_url'
            ]);
        });
    }
};
