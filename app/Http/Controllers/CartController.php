<?php

namespace App\Http\Controllers;

use App\Produit;
use App\typeProduit;
use App\MarqueProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $panier=0;
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        
        return view('shop.cart',[
            'title'=>"cart",
            'user' => "$user->firstname ".strtoupper($user->name),
            'panier'=>$panier,
            'articles'=>unserialize($value),
        ]);
    }
}
