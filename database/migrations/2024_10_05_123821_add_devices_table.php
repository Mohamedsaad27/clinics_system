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
        Schema::create('medical_devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->integer('device_number');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'in maintenance', 'decommissioned']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
