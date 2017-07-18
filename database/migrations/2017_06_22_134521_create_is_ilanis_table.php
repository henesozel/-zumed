<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsIlanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('is_ilanis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mezun_id');
            $table->text('baslik');
            $table->text('tecrube');
            $table->text('egitim_seviyesi');
            $table->text('firma_sektor');
            $table->text('departman');
            $table->text('calisma_sekli');
            $table->text('pozisyon_seviyesi');
            $table->integer('personel_sayisi');
            $table->text('iletisim');
            $table->date('tarih');
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
        Schema::dropIfExists('is_ilanis');
    }
}
