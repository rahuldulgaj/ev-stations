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
            $table->string('battary_size',128)->nullable();
            $table->string('charging_standard',128)->nullable();
            $table->string('compatiable_charging',128)->nullable();
            $table->string('range',128)->nullable();
            $table->string('dc_charging_time',128)->nullable();
            $table->string('home_plug_charging_time',128)->nullable();
            $table->string('swappable_battary',128)->nullable();
            $table->string('price',128)->nullable();
            $table->string('description',128)->nullable();
        $table->bigInteger('status');
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
