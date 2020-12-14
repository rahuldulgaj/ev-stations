<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evstations', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->string('evs_slug',128);
            $table->string('evs_code',128);
            $table->string('ownername',128);
            $table->string('address',128)->unique();
            $table->string('username');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('lat_lang')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternatecontact');
            $table->string('usagetype');
            $table->string('automated_status');
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('company_id')->nullable();
            $table->text('image')->nullable();
          //  $table->date('join_date')->nullable();
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
        Schema::dropIfExists('evstations');
    }
}
