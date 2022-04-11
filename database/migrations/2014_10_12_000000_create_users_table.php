<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
    */
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('restaurant_name', 50);
            $table->string('address', 50);
            $table->string('vat_number', 11)->unique();
            $table->text('img_path')->nullable();
            $table->string('slug', 70)->unique();
            $table->string('description', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
    */

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
