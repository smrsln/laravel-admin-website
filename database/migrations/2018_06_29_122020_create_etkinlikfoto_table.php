<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtkinlikfotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etkinlikfoto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('etkinlik_id');
            $table->foreign('etkinlik_id')->references('id')->on('etkinlik')->ondelete('cascade');
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
        Schema::dropIfExists('etkinlikfoto');
    }
}
