<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurisprudencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurisprudences', function (Blueprint $table) {
            $table->id();
            $table->string('cabinetname');
            $table->string('Contencieux');
            $table->date('date');
            $table->string('dossiername');
            $table->integer('dossiernumero');
            $table->string('file');
            $table->string('resultat');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurisprudences');
    }
}
