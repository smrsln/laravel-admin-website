<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUyeEtkinlikfotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uye_etkinlikfoto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uye_etkinlik_id');
            $table->foreign('uye_etkinlik_id')->references('id')->on('uye_etkinlik')->ondelete('cascade');
            $table->string('foto');
            $table->softDeletes();
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
        Schema::dropIfExists('uye_etkinlikfoto');
    }
}
