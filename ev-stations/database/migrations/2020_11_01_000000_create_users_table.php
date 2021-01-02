<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname',128);
            $table->string('lastname',128);
            $table->string('email',128)->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->boolean('status')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternatecontact')->nullable();
            $table->string('address');
            $table->string('gender');
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->text('image')->nullable();
            $table->rememberToken();
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
        Schema::table('users', function(Blueprint $table)
    {
        $table->dropForeign('users_role_id_foreign'); 
    });
    Schema::dropIfExists('users');
}
}
