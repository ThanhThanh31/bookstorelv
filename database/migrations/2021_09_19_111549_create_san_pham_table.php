<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id('sp_id');
            $table->string('sp_ten');
            $table->string('sp_hinhanh');
            $table->integer('sp_sotrang');
            $table->string('sp_kichthuoc');
            $table->string('sp_trangthai')->nullable();
            $table->float('sp_gia');
            $table->string('sp_mota');

            $table->bigInteger('lv_id')->unsigned();
            $table->foreign('lv_id')->references('lv_id')->on('linh_vuc')->onDelete('cascade');

            $table->bigInteger('nxb_id')->unsigned()->nullable();
            $table->foreign('nxb_id')->references('nxb_id')->on('nha_xuatban')->onDelete('cascade');

            $table->bigInteger('lb_id')->unsigned()->nullable();
            $table->foreign('lb_id')->references('lb_id')->on('loai_bia')->onDelete('cascade');

            $table->bigInteger('cty_id')->unsigned()->nullable();
            $table->foreign('cty_id')->references('cty_id')->on('congty_phathanh')->onDelete('cascade');

            $table->bigInteger('tg_id')->unsigned()->nullable();
            $table->foreign('tg_id')->references('tg_id')->on('tac_gia')->onDelete('cascade');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('ttp_id')->unsigned();
            $table->foreign('ttp_id')->references('ttp_id')->on('tinh_thanhpho')->onDelete('cascade');

            $table->bigInteger('qh_id')->unsigned();
            $table->foreign('qh_id')->references('qh_id')->on('quan_huyen')->onDelete('cascade');

            $table->bigInteger('xp_id')->unsigned();
            $table->foreign('xp_id')->references('xp_id')->on('xa_phuong')->onDelete('cascade');
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
        Schema::dropIfExists('san_pham');
    }
}
