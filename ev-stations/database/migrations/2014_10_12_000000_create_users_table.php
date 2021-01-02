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
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('role_id')->unsigned()->nullable();
         
          //  $table->boolean('role_id')->nullable();
            $table->boolean('status')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternatecontact')->nullable();
            $table->string('address');
            $table->string('gender');
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->text('image')->nullable();
            $table->rememberToken();
            $table->timestamps();

         
        });
       Schema::table('users', function($table) {
            //FORE IGN KEY CONSTRAINTS
           // $table->foreign('role_id')->references('id')->on('roles')->unsigned();
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->unsigned()->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->unsigned()->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->unsigned()->onDelete('cascade');
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropIfExists('users');
            $table->dropIfExists('users_role_id_foreign');
    });
}
}
