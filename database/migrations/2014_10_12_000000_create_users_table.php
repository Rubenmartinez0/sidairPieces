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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->unsignedBigInteger('role_id')->default(7);
            $table->index('role_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->index('client_id');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->index('project_id');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->index('material_id');
            $table->boolean('active')->default(1);
            $table->boolean('visible')->default(1);
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
