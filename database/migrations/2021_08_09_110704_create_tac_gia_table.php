<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tac_gia', function (Blueprint $table) {
            $table->id('tg_id');
            $table->string('tg_ten');
            $table->boolean('tg_gioitinh')->nullable();
            $table->integer('tg_sdt')->nullable();
            $table->string('tg_email')->nullable();
            $table->string('tg_diachi')->nullable();

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
        Schema::dropIfExists('tac_gia');
    }
}
