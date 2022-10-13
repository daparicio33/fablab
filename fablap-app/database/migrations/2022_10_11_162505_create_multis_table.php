<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multis', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->longText('descripcion');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('entrada_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('entrada_id')->references('id')->on('entradas');
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
        Schema::dropIfExists('multis');
    }
}
