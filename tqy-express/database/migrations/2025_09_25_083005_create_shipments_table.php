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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id('shipment_id'); // primary key

            // Sender details
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->text('sender_address');

            // Receiver details
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->text('receiver_address');

            // Package details
            $table->decimal('weight', 8, 2); // up to 999,999.99 kg
            $table->string('size');          // e.g. small, medium, large
            $table->enum('service_type', ['reguler', 'ekspres']); 

            // Relation to payments
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')
                  ->references('payment_id')
                  ->on('payments')
                  ->onDelete('cascade');

            // Shipment status
            $table->enum('status', ['diproses', 'dikirim', 'selesai'])
                  ->default('diproses');

            // Order date
            $table->timestamp('order_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
