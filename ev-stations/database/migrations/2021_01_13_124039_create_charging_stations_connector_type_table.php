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
            $table->bigInteger('charging_stations_id')->unsigned();
            $table->bigInteger('connector_type_id')->unsigned();
            $table->bigInteger('price')->nullable();
            $table->bigInteger('kwatt')->nullable();
            $table->bigInteger('amps')->nullable();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('rate_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

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
