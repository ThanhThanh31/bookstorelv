<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->id('tt_id');
            $table->string('tt_ten');
            $table->text('tt_noidung');
            $table->integer('tt_trangthai');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nguoi_dung')->onDelete('cascade');

            $table->bigInteger('qt_id')->unsigned()->nullable();;
            $table->foreign('qt_id')->references('qt_id')->on('quan_tri')->onDelete('cascade');
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
        Schema::dropIfExists('tin_tuc');
    }
}
