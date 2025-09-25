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
        Schema::create('courier_performances', function (Blueprint $table) {
            $table->id('id'); // primary key for the record

            // Courier details
            $table->unsignedBigInteger('courier_id');
            $table->string('courier_phone');

            // Assignment and performance
            $table->date('assign_date');
            $table->integer('total_assigned')->default(0);
            $table->integer('delivered_packages')->default(0);
            $table->decimal('performance_percentage', 5, 2)->default(0.00);

            // Delivery details
            $table->timestamp('last_delivery_time')->nullable();
            $table->enum('delivery_status', ['aktif', 'selesai', 'gagal'])->default('aktif');

            // Foreign key relation to users
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
        Schema::dropIfExists('courier_performance');
    }
};
