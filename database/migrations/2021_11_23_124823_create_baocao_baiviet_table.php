<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaocaoBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baocao_baiviet', function (Blueprint $table) {
            $table->id('bb_id');
            $table->string('bb_noidung');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('bv_id')->unsigned();
            $table->foreign('bv_id')->references('bv_id')->on('bai_viet')->onDelete('cascade');
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
        Schema::dropIfExists('baocao_baiviet');
    }
}
