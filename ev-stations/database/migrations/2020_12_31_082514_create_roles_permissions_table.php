<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');

         

            //SETTING THE PRIMARY KEYS
            $table->primary(['role_id','permission_id']);
        });
        Schema::table('roles_permissions', function($table) {
            //FOREIGN KEY CONSTRAINTS
       $table->foreign('role_id')->references('id')->on('roles');
       $table->foreign('permission_id')->references('id')->on('permissions');
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
