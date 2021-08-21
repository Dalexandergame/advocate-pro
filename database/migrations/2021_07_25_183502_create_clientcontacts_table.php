<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientcontacts', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contact');
            $table->string('adresse');
            $table->string('mail');
            $table->string('tel');
            $table->string('ville');
            $table->integer('dossier_lier');
            $table->string('tagwords');
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
        Schema::dropIfExists('clientcontacts');
    }
}
