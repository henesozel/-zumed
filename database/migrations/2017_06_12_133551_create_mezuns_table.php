<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMezunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mezuns', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kullanici_adi');
            $table->text('sifre');
            $table->text('ad');
            $table->text('soyad');
            $table->text('email');
            $table->text('cinsiyet');
            $table->text('is_yeri')->nullable();
            $table->text('resim')->nullable();
            $table->bigInteger('telefon');
            $table->bigInteger('mezun_yili');
            $table->bigInteger('mezun_kart_id')->nullable();
            $table->integer('aktif')->nullable();
            $table->integer('mezun_kart_aktif')->nullable();
            $table->text('hash');
            $table->text('bolum');



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
        Schema::dropIfExists('mezuns');
    }
}
