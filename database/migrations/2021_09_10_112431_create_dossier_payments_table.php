<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_payments', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('user_id')->constrained('users')->onDelete('cascade');
            $table->ForeignId('dossier_id')->constrained('dossierjuridiques')->onDelete('cascade');
            $table->ForeignId('client_id')->constrained('clientcomptes')->onDelete('cascade');
            $table->unsignedInteger('somme');
            $table->string('payment_method');
            $table->string('status')->default('En Attente');
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
        Schema::dropIfExists('dossier_payments');
    }
}
