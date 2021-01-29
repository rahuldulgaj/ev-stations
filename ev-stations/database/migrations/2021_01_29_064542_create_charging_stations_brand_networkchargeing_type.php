<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargingStationsBrandNetworkchargeingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charging_stations_connector_type', function($table) {
            //FORE IGN KEY CONSTRAINTS
            //This schema used for User Table Foreign key or Relationship of tables Correct //
            $table->foreign('charging_stations_id')->references('id')->on('charging_stations')->unsigned()->onDelete('cascade');
            $table->foreign('connector_type_id')->references('id')->on('connector_types')->unsigned()->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brand_types')->unsigned()->onDelete('cascade');
          //  $table->foreign('company_id')->references('id')->on('companies')->unsigned()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charging_stations_brand_networkchargeing_type');
    }
}
