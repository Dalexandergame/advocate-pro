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
            $table->date('date_creation')->nullable();
            $table->string('type_dossier');
            $table->string('tagwords')->nullable();
            $table->string('commentaire')->nullable();
            $table->string('payment_mode')->nullable();

            $table->string('jugement')->nullable();

            $table->string('parent', 20)->nullable();

            $table->timestamps();
        });

        Schema::table('dossierjuridiques', function (Blueprint $table) {
            $table->foreign('parent')
                ->references('file_number')
                ->on('dossierjuridiques')
                ->onDelete('cascade');

            $table->ForeignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');

            $table->ForeignId('exepmle_id')
                ->nullable()
                ->constrained('govertemplates')
                ->onDelete('cascade');

            $table->ForeignId('compte_pour')
                ->nullable()
                ->constrained('clientcomptes')
                ->onDelete('cascade');

            $table->ForeignId('compte_contre')
                ->nullable()
                ->constrained('clientcomptes')
                ->onDelete('cascade');

            $table->ForeignId('indirect_pour')
                ->nullable()
                ->constrained('clientcomptes')
                ->onDelete('cascade');

            $table->ForeignId('indirect_contre')
                ->nullable()
                ->constrained('clientcomptes')
                ->onDelete('cascade');
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
