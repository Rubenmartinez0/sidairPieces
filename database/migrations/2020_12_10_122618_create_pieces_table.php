<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("quantity");
            $table->mediumText('measurements')->nullable();
            // $table->unsignedBigInteger('image_id');
            // $table->index('image_id');
            $table->unsignedBigInteger('pieceType_id');
            $table->index('pieceType_id');
            $table->unsignedBigInteger('material_id');
            $table->index('material_id');
            $table->unsignedBigInteger('state_id');
            $table->index('state_id');
            $table->unsignedBigInteger('project_id');
            $table->index('project_id');
            $table->unsignedBigInteger('ordered_by');
            $table->index('ordered_by');
            $table->timestamp("ordered_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('manufactured_by')->nullable();
            $table->index('manufactured_by')->nullable();
            $table->timestamp("manufactured_at")->nullable();
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
        Schema::dropIfExists('pieces');
    }
}
