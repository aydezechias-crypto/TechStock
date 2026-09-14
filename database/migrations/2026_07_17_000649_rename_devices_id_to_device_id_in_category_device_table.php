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
        Schema::table('category_device', function (Blueprint $table) {
            //
            $table->renameColumn('devices_id', 'device_id');
            $table->renameColumn('categories_id', 'category_id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_device', function (Blueprint $table) {
            //
            $table->renameColumn('device_id', 'devices_id');
            $table->renameColumn('category_id', 'categories_id');

        });
    }
};
