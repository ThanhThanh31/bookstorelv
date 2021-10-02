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
            $table->integer('sp_soluong');
            $table->integer('sp_sotrang');
            $table->string('sp_kichthuoc');
            $table->float('sp_gia');
            $table->text('sp_mota');

            $table->bigInteger('tl_id')->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('the_loai')->onDelete('cascade');

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
        Schema::dropIfExists('san_pham');
    }
}
