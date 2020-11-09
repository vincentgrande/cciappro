<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('idCommande');
            $table->string('quantite');
            $table->date('dateCommande');
            $table->unsignedBigInteger('idProduit');
            $table->foreign('idProduit')->references('idProduit')->on('produits');
            $table->unsignedBigInteger('idEtat');
            $table->foreign('idEtat')->references('idEtat')->on('etats');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('commandes');
    }
}
