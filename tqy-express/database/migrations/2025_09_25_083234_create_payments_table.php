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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // primary key
            $table->decimal('amount', 12, 2); // e.g. 9999999999.99 max
            $table->string('method'); // e.g. cash, transfer, credit card
            $table->enum('status', ['berhasil', 'pending', 'gagal'])
                  ->default('pending'); // default to pending
            $table->timestamp('created_at')->useCurrent(); // auto timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
