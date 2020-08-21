<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYonetimKuruluTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yonetim_kurulu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ykfoto');
            $table->string('yk_ad_soyad');
            $table->text('yk_ozgecmis');
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
        Schema::dropIfExists('yonetim_kurulu');
    }
}
