<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtkinliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etkinliks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mezun_id');
            $table->text('baslik');
            $table->text('resim')->nullable();
            $table->integer('ucret')->default('0');
            $table->integer('kisiSayisi');
            $table->text('etkinlikTanimi');
            $table->date('tarih');
            $table->integer('gorunum')->default('0');
            $table->integer('onayla')->default('0');
            $table->integer('yayinla')->default('0');
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
        Schema::dropIfExists('etkinliks');
    }
}
