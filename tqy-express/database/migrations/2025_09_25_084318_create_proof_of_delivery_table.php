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
        Schema::create('proof_of_delivery', function (Blueprint $table) {
            $table->id('pod_id'); // primary key

            // Relations
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('courier_id');

            // Delivery confirmation details
            $table->string('received_by');       // name of recipient
            $table->string('signature')->nullable(); // path to signature image file
            $table->string('photo')->nullable();     // path to delivery photo
            $table->timestamp('delivered_at')->useCurrent();

            // Foreign key constraints
            $table->foreign('shipment_id')
                  ->references('shipment_id')
                  ->on('shipments')
                  ->onDelete('cascade');

            $table->foreign('courier_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proof_of_delivery');
    }
};
