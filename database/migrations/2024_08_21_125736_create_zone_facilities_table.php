<?php
// database/migrations/xxxx_xx_xx_create_zone_facilities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('zone_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('zone');
            $table->string('facility_name')->nullable();
            $table->string('item_name');
            $table->string('condition')->nullable();
            $table->string('image')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zone_facilities');
    }
}
