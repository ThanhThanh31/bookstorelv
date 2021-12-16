<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id('nd_id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('nd_diachi');
            $table->integer('nd_sdt');
            $table->string('nd_anh')->nullable();
            $table->integer('nd_trangthai')->default('1');

            $table->bigInteger('q_id')->unsigned()->default('1');
            $table->foreign('q_id')->references('q_id')->on('quyen')->onDelete('cascade');

            $table->bigInteger('qt_id')->unsigned()->nullable();
            $table->foreign('qt_id')->references('qt_id')->on('quan_tri')->onDelete('cascade');

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
        Schema::dropIfExists('nguoi_dung');
    }
}
