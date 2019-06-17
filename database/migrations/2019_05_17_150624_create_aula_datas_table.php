<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_datas', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('sala');
            $table->string('predio');
            $table->dateTime('dia');
            $table->dateTime('dia_libera');
            $table->dateTime('dia_bloqueia');
            $table->time('aula_ini');
            $table->time('aula_fim')->nullable();;
            $table->unsignedBigInteger('aula_id');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');            
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
        Schema::dropIfExists('aula_datas');
    }
}
