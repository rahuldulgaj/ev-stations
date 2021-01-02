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
            $table->string('evslug',128);
            $table->string('evcode',128);
            $table->string('ownername',128);
            $table->string('address',128)->unique();
            $table->string('username');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('lat_lang')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternatecontact');
            $table->bigInteger('usagetype');
            $table->bigInteger('automated_status');
            $table->bigInteger('country_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('time_slot_id')->nullable();
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
