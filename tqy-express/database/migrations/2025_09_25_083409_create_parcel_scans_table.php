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
        Schema::create('parcel_scans', function (Blueprint $table) {
            $table->id('scan_id'); // primary key

            // Foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('hub_id');

            // Scan details
            $table->string('status');      // e.g. arrived, departed, delayed
            $table->timestamp('scan_time')->useCurrent();
            $table->string('updated_by')->nullable();
            $table->text('remarks')->nullable();

            // Foreign key constraints
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('shipment_id')
                  ->references('shipment_id')
                  ->on('shipments')
                  ->onDelete('cascade');

            $table->foreign('hub_id')
                  ->references('hub_id')
                  ->on('hubs')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcel_scans');
    }
};
