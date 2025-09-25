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
        Schema::create('hubs', function (Blueprint $table) {
            $table->id('hub_id'); // primary key

            $table->string('hub_name');
            $table->string('city');
            $table->string('province');
            $table->text('full_address');
            $table->string('postal_code', 10);

            // Coordinates
            $table->decimal('latitude', 10, 7)->nullable();   // e.g. -6.2000000
            $table->decimal('longitude', 10, 7)->nullable();  // e.g. 106.8166667

            // Other hub details
            $table->string('hub_type'); 
            $table->integer('capacity'); // kapasitas penyimpanan hub
            $table->string('phone')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('status')->default('active'); // e.g. active, inactive
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubs');
    }
};
