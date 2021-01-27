<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargingStationsConnectorTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charging_stations_connector_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('charging_stations_id');
            $table->integer('connector_type_id');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('kwatt')->nullable();
            $table->bigInteger('amps')->nullable();
            $table->bigInteger('network_id')->nullable();
            $table->bigInteger('rate_id')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charging_stations_connector_type');
    }
}
