<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinhVucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linh_vuc', function (Blueprint $table) {
            $table->id('lv_id');
            $table->string('lv_ten');

            $table->bigInteger('tl_id')->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('theloai_cuahang')->onDelete('cascade');
            $table->bigInteger('ch_id')->unsigned();
            $table->foreign('ch_id')->references('ch_id')->on('theloai_cuahang')->onDelete('cascade');
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
        Schema::dropIfExists('linh_vuc');
    }
}
