<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSayacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uyedernek');
            $table->string('uyefederasyon');
            $table->string('uyekonfederasyon');
            $table->string('ziyaretci');
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
        Schema::dropIfExists('sayac');
    }
}
