<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unsigned()->index();
            $table->unsignedInteger('permission_id')->unsigned()->index();

            //FOREIGN KEY CONSTRAINTS
            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','permission_id']);
        });
        Schema::table('users_roles', function($table) {
            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->unsigned()->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->unsigned()->onDelete('cascade');
            
        });
        Schema::table('users', function($table) {
            //FORE IGN KEY CONSTRAINTS
         //   $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            //   $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->unsigned()->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->unsigned()->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->unsigned()->onDelete('cascade');
        });
     
        Schema::table('users_permissions', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->unsigned()->unique()->onDelete('cascade');
                $table->foreign('permission_id')->references('id')->on('permissions')->unsigned()->unique()->onDelete('cascade');
                
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_permissions');
    }
}
