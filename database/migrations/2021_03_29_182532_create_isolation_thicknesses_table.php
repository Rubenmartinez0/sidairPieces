<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsolationThicknessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isolation_thicknesses', function (Blueprint $table) {
            $table->id();
            $table->integer('thickness');
            $table->string('unit');
            $table->unsignedBigInteger('type_id');
            $table->index('type_id');
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
        Schema::dropIfExists('isolation_thicknesses');
    }
}
