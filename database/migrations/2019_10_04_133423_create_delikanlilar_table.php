<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelikanlilarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delikanlilar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('delikanlifoto');
            $table->string('delikanli_ad_soyad');
            $table->text('delikanli_ozgecmis');
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
        Schema::dropIfExists('delikanlilar');
    }
}
