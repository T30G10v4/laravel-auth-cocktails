<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocktail_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('cocktail_id');
            $table->foreign('cocktail_id')->references('id')->on('cocktails')->cascadeOnDelete();


            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->restrictOnDelete();


            $table->float('quantity', 8, 4);
            


            $table->primary(['cocktail_id','ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cocktail_ingredient');
    }
};
