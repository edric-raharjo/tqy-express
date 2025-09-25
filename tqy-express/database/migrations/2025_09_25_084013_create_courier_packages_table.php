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
        Schema::create('courier_packages', function (Blueprint $table) {
            // Foreign keys
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('shipment_id');

            // Assignment date
            $table->timestamp('assign_date')->useCurrent();

            // Composite primary key
            $table->primary(['courier_id', 'shipment_id']);

            // Foreign key constraints
            $table->foreign('courier_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('shipment_id')
                  ->references('shipment_id')
                  ->on('shipments')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_packages');
    }
};
