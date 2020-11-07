<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function marque() {
        return $this->hasOne('App\MarqueProduit', 'idMarqueProduit', 'idMarqueProduit');
    }
 
    public function type() {
        return $this->hasOne('App\TypeProduit', 'idTypeProduit', 'idTypeProduit');
    }
}
