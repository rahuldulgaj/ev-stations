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
