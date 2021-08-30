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
            $table->boolean('nd_gioitinh');
            $table->integer('nd_sdt');
            $table->string('password');

            $table->bigInteger('q_id')->unsigned()->default('1');
            $table->foreign('q_id')->references('q_id')->on('quyen')->onDelete('cascade');

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
        Schema::dropIfExists('nguoi_dung');
    }
}
