<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('name', 50);
            $table->tinyInteger('role_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->date('created_date');
            $table->date('updated_date');
            $table->date('deleted_date')->nullable();
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
};
