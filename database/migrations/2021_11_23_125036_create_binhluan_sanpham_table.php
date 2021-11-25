<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluanSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan_sanpham', function (Blueprint $table) {
            $table->id('bs_id');
            $table->string('bs_id_reply')->nullable();
            $table->string('bs_noidung');

            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('san_pham')->onDelete('cascade');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoi_dung')->onDelete('cascade');

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
        Schema::dropIfExists('binhluan_sanpham');
    }
}
