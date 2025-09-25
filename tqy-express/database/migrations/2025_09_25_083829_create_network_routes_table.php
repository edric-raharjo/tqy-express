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
        Schema::create('network_routes', function (Blueprint $table) {
            $table->id('route_id'); // primary key

            // Hub relationships
            $table->unsignedBigInteger('origin_hub');
            $table->unsignedBigInteger('destination_hub');
            $table->unsignedBigInteger('current_hub')->nullable();
            $table->unsignedBigInteger('next_hub')->nullable();

            // Route details
            $table->decimal('distance_km', 8, 2);           // up to 999,999.99 km
            $table->decimal('estimated_time_hours', 8, 2);  // e.g. 12.50 hours

            // Foreign keys
            $table->foreign('origin_hub')
                  ->references('hub_id')
                  ->on('hubs')
                  ->onDelete('cascade');

            $table->foreign('destination_hub')
                  ->references('hub_id')
                  ->on('hubs')
                  ->onDelete('cascade');

            $table->foreign('current_hub')
                  ->references('hub_id')
                  ->on('hubs')
                  ->onDelete('set null');

            $table->foreign('next_hub')
                  ->references('hub_id')
                  ->on('hubs')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_routes');
    }
};
