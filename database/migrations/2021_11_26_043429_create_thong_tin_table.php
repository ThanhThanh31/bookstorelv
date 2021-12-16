<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_tin', function (Blueprint $table) {
            $table->id('tt_id');
            $table->string('tt_tieude');
            $table->longtext('tt_noidung');
            $table->longtext('tt_bando');
            $table->longtext('tt_fanpage');
            $table->longtext('tt_lienhe');

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
        Schema::dropIfExists('thong_tin');
    }
}
