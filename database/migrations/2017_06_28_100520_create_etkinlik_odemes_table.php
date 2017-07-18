<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtkinlikOdemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etkinlik_odemes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etkinlik_id');
            $table->integer('misafir_id')->nullable();
            $table->integer('kisiSayisi');
            $table->text('kullanici_adi');
            $table->integer('odenicekMiktar');
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
        Schema::dropIfExists('etkinlik_odemes');
    }
}
