<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            $table->bigInteger('serial_number')->unique()->primary();
            $table->ForeignId('user_id')->constrained('users')->onDelete('cascade');
            $table->ForeignId('mission_id')->constrained('missions')->nullable()->onDelete('cascade');
            $table->ForeignId('dossierjuridique_id')->constrained('dossierjuridiques')->nullable()->onDelete('cascade');
            $table->string('screen');
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
        Schema::dropIfExists('cheques');
    }
}
