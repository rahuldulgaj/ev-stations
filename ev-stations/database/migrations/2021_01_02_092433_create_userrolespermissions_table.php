<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolespermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function($table) {
            //FORE IGN KEY CONSTRAINTS
            //This schema used for User Table Foreign key or Relationship of tables Correct //
            $table->foreign('country_id')->references('id')->on('countries')->unsigned()->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->unsigned()->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->unsigned()->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->unsigned()->onDelete('cascade');
        });
        Schema::table('evstations', function($table) {
            //FORE IGN KEY CONSTRAINTS
            //This schema used for User Table Foreign key or Relationship of tables Correct //
            $table->foreign('country_id')->references('id')->on('countries')->unsigned()->onDelete('cascade');
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
        Schema::dropIfExists('roles_permissions');
    }
}
