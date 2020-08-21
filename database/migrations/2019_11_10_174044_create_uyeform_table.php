<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUyeformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uyeform', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dernek_adi');
            $table->string('dernek_no');
            $table->string('dernek_adres');
            $table->string('dernek_tel');
            $table->string('dernek_baskan');
            $table->text('dernek_amac');
            $table->string('dilekce');
            $table->string('faaliyet_belgesi');
            $table->string('ucuncu_karar');
            $table->string('imza_sirku');
            $table->string('delege_bilgi');
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
        Schema::dropIfExists('uyeform');
    }
}
