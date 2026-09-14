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
        Schema::create('category_device', function (Blueprint $table) {
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
            $table->foreignId('devices_id')->constrained()->onDelete('cascade');
            $table->primary(['categories_id','devices_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_device');
    }
};
