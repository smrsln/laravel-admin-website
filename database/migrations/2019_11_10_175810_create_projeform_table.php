<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjeformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeform', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dernek_adi');
            $table->string('dernek_adres');
            $table->string('dernek_tel');
            $table->string('dernek_baskan');
            $table->text('proje_ozet');
            $table->string('proje');
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
        Schema::dropIfExists('projeform');
    }
}
