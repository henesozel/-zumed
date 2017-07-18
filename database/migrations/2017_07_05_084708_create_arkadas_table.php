<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArkadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arkadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('takip_eden');
            $table->integer('takip_edilen');
            $table->integer('onayla')->default('0');
            $table->integer('sil')->default('0');

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
        Schema::dropIfExists('arkadas');
    }
}
