<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unsigned()->nullable();
            $table->unsignedInteger('role_id')->unsigned()->nullable();

       
         //SETTING THE PRIMARY KEYS
           $table->primary(['user_id','role_id']);
        });
        Schema::table('users_roles', function($table) {
            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->unsigned()->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->unsigned()->onDelete('cascade');
 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
