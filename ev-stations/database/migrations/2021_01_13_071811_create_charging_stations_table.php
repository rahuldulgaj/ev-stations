<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargingStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charging_stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',128);
            $table->string('slug',128)->unique();
            $table->string('code',128)->unique();
            $table->string('ownername',128);
            $table->string('email',128)->unique();
            $table->string('websites',128)->nullable();
            $table->string('address',128)->nullable();
            $table->string('username');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('lat_lang')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternatecontact');
            $table->bigInteger('usagetype_id')->unsigned()->nullable();
            $table->bigInteger('automated_status_id');
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('time_slot_id')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->string('numbers_of_ports')->nullable();
            $table->text('image')->nullable();
            $table->boolean('status')->nullable();       
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
        Schema::dropIfExists('charging_stations');
    }
}
