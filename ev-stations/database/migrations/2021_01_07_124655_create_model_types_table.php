<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('modelcode',128)->unique();
            $table->bigInteger('brand_types_id')->unsigned();
            $table->bigInteger('vehicle_types_id')->unsigned();
            $table->string('battary_size',128);
            $table->string('charging_standard',128);
            $table->string('compatiable_charging',128);
            $table->string('range',128);
            $table->string('dc_charging_time',128);
            $table->string('home_plug_charging_time',128);
            $table->string('swappable_battary',128);
            $table->string('price',128);
            $table->string('description',128);
            $table->bigInteger('status');
            $table->text('image');
            $table->timestamps();
        });
        Schema::table('model_types', function($table) {
            $table->foreign('brand_types_id')->references('id')->on('brand_types')->unsigned()->onDelete('cascade');
            $table->foreign('vehicle_types_id')->references('id')->on('vehicle_types')->unsigned()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_types');
    }
}
