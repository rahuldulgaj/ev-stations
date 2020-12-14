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
            $table->id();
            $table->string('firstname',128);
            $table->string('lastname',128);
            $table->string('email',128)->unique();
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->boolean('status')->nullable();
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('alternatecontact')->nullable();
            $table->string('address');
            $table->string('gender');
            $table->date('join_date');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('company')->nullable();
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
        Schema::dropIfExists('users');
    }
}
