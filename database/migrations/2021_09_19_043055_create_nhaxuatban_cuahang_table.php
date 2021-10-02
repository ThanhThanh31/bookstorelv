<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaxuatbanCuahangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhaxuatban_cuahang', function (Blueprint $table) {
            $table->bigInteger('nxb_id')->unsigned();
            $table->foreign('nxb_id')->references('nxb_id')->on('nha_xuatban')->onDelete('cascade');

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
        Schema::dropIfExists('nhaxuatban_cuahang');
    }
}
