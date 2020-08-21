<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAksakallilarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksakallilar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aksakallifoto');
            $table->string('aksakalli_ad_soyad');
            $table->text('aksakalli_ozgecmis');
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
        Schema::dropIfExists('aksakallilar');
    }
}
