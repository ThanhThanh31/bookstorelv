<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaChiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_chi', function (Blueprint $table) {
            $table->id('dc_id');
            $table->string('dc_ten');

            $table->bigInteger('ttp_id')->unsigned();
            $table->foreign('ttp_id')->references('ttp_id')->on('tinh_thanhpho')->onDelete('cascade');
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
        Schema::dropIfExists('dia_chi');
    }
}
