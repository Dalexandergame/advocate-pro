<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_payments', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('user_id')->constrained('users')->onDelete('cascade');
            $table->ForeignId('mission_id')->constrained('missions')->onDelete('cascade');;
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
        Schema::dropIfExists('mission_payments');
    }
}
