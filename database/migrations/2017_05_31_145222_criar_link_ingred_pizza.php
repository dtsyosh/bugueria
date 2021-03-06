<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarLinkIngredPizza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qtde_porcoes');
            $table->integer('ingrediente_id')->unsigned();
            $table->integer('pizza_id')->unsigned();


            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
            $table->foreign('pizza_id')->references('id')->on('pizzas');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('ingrediente_pizza', function (Blueprint $table) {
            $table->dropForeign('ingrediente_pizza_pizza_id_foreign');
            $table->dropForeign('ingrediente_pizza_ingrediente_id_foreign');
        });

        Schema::dropIfExists('ingrediente_pizza');
    }
}
