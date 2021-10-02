<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaibiaCuahangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaibia_cuahang', function (Blueprint $table) {
            $table->bigInteger('lb_id')->unsigned();
            $table->foreign('lb_id')->references('lb_id')->on('loai_bia')->onDelete('cascade');

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
        Schema::dropIfExists('loaibia_cuahang');
    }
}
