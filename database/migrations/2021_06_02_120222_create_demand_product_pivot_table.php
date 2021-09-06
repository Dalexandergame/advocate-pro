<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demand_product', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('product_id')
                ->constrained('products')
                ->onDelete('cascade');

            $table->ForeignId('demand_id')
                ->constrained('demands')
                ->onDelete('cascade');

            $table->unsignedInteger('quantity');
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
        Schema::dropIfExists('demand_product');
    }
}
