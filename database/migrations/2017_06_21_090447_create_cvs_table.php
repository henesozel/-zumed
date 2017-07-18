<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mezun_id');
            $table->text('yabanci_dil');
            $table->text('kisisel_bilgiler');
            $table->text('egitim_bilgileri');
            $table->text('bilgisayar_bilgisi');
            $table->text('sertifikalar');
            $table->text('referanslar');
            $table->text('kariyer_hedefi');
            $table->text('alanlar');
            $table->text('cv_ad');
            $table->text('resim');
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
        Schema::dropIfExists('cvs');
    }
}
