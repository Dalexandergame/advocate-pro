<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientcomptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientcomptes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('adresse');
            $table->string('nom_contact');
            $table->string('tel_contact');
            $table->string('mail_contact');
            $table->string('nom_contact_principal');
            $table->string('tel_contact_principal');
            $table->string('mail_contact_principal');
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
        Schema::dropIfExists('clientcomptes');
    }
}
