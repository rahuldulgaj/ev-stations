<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolespermissionsnewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_permissions', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->unsigned()->onDelete('cascade');
        $table->foreign('permission_id')->references('id')->on('permissions')->unsigned()->onDelete('cascade');
                
            });
            Schema::table('states', function($table) {
                //FORE IGN KEY CONSTRAINTS
                //This schema used for User Table Foreign key or Relationship of tables Correct //
                $table->foreign('country_id')->references('id')->on('countries')->unsigned()->onDelete('cascade');
            });
            Schema::table('cities', function($table) {
                //FORE IGN KEY CONSTRAINTS
                //This schema used for User Table Foreign key or Relationship of tables Correct //
                $table->foreign('country_id')->references('id')->on('countries')->unsigned()->onDelete('cascade');
                $table->foreign('state_id')->references('id')->on('states')->unsigned()->onDelete('cascade');
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
