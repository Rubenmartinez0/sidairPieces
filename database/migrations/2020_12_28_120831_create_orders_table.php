<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->index('client_id');
            $table->unsignedBigInteger('project_id');
            $table->index('project_id');
            $table->unsignedBigInteger('created_by');
            $table->index('created_by');
            $table->unsignedBigInteger('material_id');
            $table->index('material_id');
            $table->unsignedBigInteger('state_id');
            $table->index('state_id');
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
        Schema::dropIfExists('orders');
    }
}
