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
            $table->string('file_number',20)->unique();
            $table->date('date_creation');
            $table->string('type_dossier');

            $table->string('tagwords')->nullable();

            $table->string('commentaire');

            $table->string('tribunal_number'); 

            $table->dateTime('dateaudiance')->nullable();
            $table->string('remarque')->nullable();
            $table->string('mesures')->nullable();


            $table->ForeignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->ForeignId('compte_pour')
                ->constrained('clients')
                ->onDelete('cascade');

            $table->ForeignId('compte_contre')
                ->nullable()
                ->constrained('clients')
                ->onDelete('cascade');

            $table->ForeignId('indirect_pour')
                ->nullable()
                ->constrained('clients')
                ->onDelete('cascade');

            $table->ForeignId('indirect_contre')
                ->nullable()
                ->constrained('clients')
                ->onDelete('cascade');

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
