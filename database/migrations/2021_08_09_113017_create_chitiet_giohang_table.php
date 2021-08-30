<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietGiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_giohang', function (Blueprint $table) {
            $table->bigInteger('gh_id')->unsigned();
            $table->foreign('gh_id')->references('gh_id')->on('gio_hang')->onDelete('cascade');

            $table->bigInteger('sp_id')->unsigned();
            $table->foreign('sp_id')->references('sp_id')->on('san_pham')->onDelete('cascade');
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
        Schema::dropIfExists('chitiet_giohang');
    }
}
