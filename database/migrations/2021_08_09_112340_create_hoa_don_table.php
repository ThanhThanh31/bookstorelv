<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id('hd_id');
            $table->float('hd_tongtien');
            $table->date('hd_ngaytao');
            $table->string('hd_tennguoinhan');
            $table->text('hd_noidung');

            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('san_pham')->onDelete('cascade');

            $table->bigInteger('gh_id')->unsigned();
            $table->foreign('gh_id')->references('gh_id')->on('gio_hang')->onDelete('cascade');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('dc_id')->unsigned();
            $table->foreign('dc_id')->references('dc_id')->on('dia_chi')->onDelete('cascade');
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
        Schema::dropIfExists('hoa_don');
    }
}
