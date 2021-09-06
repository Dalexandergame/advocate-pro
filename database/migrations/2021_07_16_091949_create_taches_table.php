<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('type');
            $table->text('description');
            $table->string('etat');

            $table->dateTime('dateecheance')->nullable();

            $table->dateTime('dateaudiance')->nullable();
            $table->string('tribunal_number')->nullable();
            $table->string('remarque')->nullable();
            $table->string('mesures')->nullable();
            $table->string('dossier_num',20)->nullable();
            $table->foreign('dossier_num')
                ->nullable()
                ->references('file_number')
                ->on('dossierjuridiques')
                ->onDelete('cascade');
            
            $table->ForeignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->ForeignId('assigned_user_id')
                ->constrained('users')
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
        Schema::dropIfExists('taches');
    }
}
