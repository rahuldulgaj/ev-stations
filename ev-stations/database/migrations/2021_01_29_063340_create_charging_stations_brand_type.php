<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargingStationsBrandType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('charging_stations', function($table) {
            //FORE IGN KEY CONSTRAINTS
            //This schema used for User Table Foreign key or Relationship of tables Correct //
            $table->foreign('country_id')->references('id')->on('countries')->unsigned()->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->unsigned()->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->unsigned()->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->unsigned()->onDelete('cascade');
       //    $table->foreign('automated_status_id')->references('id')->on('automated_status')->unsigned()->onDelete('cascade');

        });
        
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charging_stations_brand_type');
        
    }
}
