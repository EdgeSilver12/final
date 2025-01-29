<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // User's Name
            $table->string('email')->unique(); // Unique Email
            $table->string('password'); // Hashed Password
            $table->enum('role', ['admin', 'user'])->default('user'); // Role Column with Default 'user'
            $table->rememberToken(); // Remember Me Token
            $table->timestamps(); // Created At & Updated At
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

