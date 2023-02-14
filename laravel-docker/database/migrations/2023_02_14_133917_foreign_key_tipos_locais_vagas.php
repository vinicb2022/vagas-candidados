<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyTiposLocaisVagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('local_id');
            $table->foreign('tipo_id')->references('id')->on('tipos_vagas')->onDelete('cascade');
            $table->foreign('local_id')->references('id')->on('locais_vagas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->dropForeign(['tipo_id']);
            $table->dropForeign(['local_id']);
            $table->dropColumn('tipo_id');
            $table->dropColumn('local_id');
        });
    }
}
