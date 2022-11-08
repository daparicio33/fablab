<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTproyectoIdToTableProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tproyecto_id')->nullable();
            $table->foreign('tproyecto_id')->references('id')->on('tproyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            //
            $table->dropForeign('proyectos_tproyecto_id_foreign');
            $table->dropColumn('tproyecto_id');
        });
    }
}
