<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idProduit');
            $table->string('nomProduit');
            $table->string('descProduit');
            $table->integer('stockProduit');
            $table->string('imgProduit');
            $table->unsignedBigInteger('idMarqueProduit');
            $table->foreign('idMarqueProduit')->references('idMarqueProduit')->on('marque_produits');
            $table->unsignedBigInteger('idTypeProduit');
            $table->foreign('idTypeProduit')->references('idTypeProduit')->on('type_produits');
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
        Schema::dropIfExists('produits');
    }
}
