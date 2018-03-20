<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('id', 36);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('business_category')->nullable();
            $table->string('state');
            $table->string('gender');
            $table->string('picture')->nullable();
            $table->enum('user_type', ['doctor', 'farmer', 'investor', 'buyer'])->default('farmer');
            $table->string('location');
            $table->text('farmproducts')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->primary('id');
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
