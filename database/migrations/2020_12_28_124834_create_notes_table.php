<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->index('project_id');
            $table->unsignedBigInteger('order_id');
            $table->index('order_id');
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->string('content');
            $table->timestamps();
            $table->unsignedBigInteger('manufactured_by')->nullable();
            $table->index('manufactured_by')->nullable();
            $table->timestamp("manufactured_at")->nullable();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
