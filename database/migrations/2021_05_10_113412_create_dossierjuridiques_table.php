<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierjuridiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossierjuridiques', function (Blueprint $table) {
            $table->id();
            $table->integer('file_number');
            $table->string('date_creation');
            $table->string('tagwords');
            $table->string('type_dossier');
            $table->string('for');
            $table->string('against');
            $table->string('client_direct');
            $table->string('client_indirect');
            $table->string('comments');
            $table->integer('tribunal_number');
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
        Schema::dropIfExists('dossierjuridiques');
    }
}
