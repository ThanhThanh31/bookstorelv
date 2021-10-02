<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaXuatbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_xuatban', function (Blueprint $table) {
            $table->id('nxb_id');
            $table->string('nxb_ten');
            $table->integer('nxb_sdt')->nullable();
            $table->string('nxb_email')->nullable();
            $table->string('nxb_diachi')->nullable();

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
        Schema::dropIfExists('nha_xuatban');
    }
}
