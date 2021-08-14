<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPham1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham1', function (Blueprint $table) {
            $table->id('sp1_id');
            $table->string('sp1_ten',30);
            $table->text('sp1_mota');
            $table->text('sp1_cachdung');
            $table->integer('sp1_trangthai');

            $table->bigInteger('l_id')->unsigned();
            $table->foreign('l_id')->references('l_id')->on('loai_sanpham')->onDelete('cascade');
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
        Schema::dropIfExists('san_pham1');
    }
}
