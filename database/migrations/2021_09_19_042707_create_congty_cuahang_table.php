<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongtyCuahangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congty_cuahang', function (Blueprint $table) {
            $table->bigInteger('cty_id')->unsigned();
            $table->foreign('cty_id')->references('cty_id')->on('congty_phathanh')->onDelete('cascade');

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
        Schema::dropIfExists('congty_cuahang');
    }
}
