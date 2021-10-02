<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacgiaCuahangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tacgia_cuahang', function (Blueprint $table) {
            $table->bigInteger('tg_id')->unsigned();
            $table->foreign('tg_id')->references('tg_id')->on('tac_gia')->onDelete('cascade');

            $table->bigInteger('ch_id')->unsigned();
            $table->foreign('ch_id')->references('ch_id')->on('cua_hang')->onDelete('cascade');
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
        Schema::dropIfExists('tacgia_cuahang');
    }
}
