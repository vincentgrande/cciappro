<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function etat() {
        return $this->hasOne('App\Etat', 'idEtat', 'idEtat');
    }
    public function produit() {
        return $this->hasOne('App\Produit', 'idProduit', 'idProduit');
    }
    public function user() {
        return $this->hasOne('App\User', 'id', 'idUser');
    }
}
