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
    //bug au delete d'un produit
    public function delete(Request $request){
        $user = Auth::user();
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);
        $bool=False;
        for($i=0; $i<count($cart);$i++){
            if($cart[$i]['article']==$request->article and $bool==False){
                array_splice($cart, $i);
                $bool=True;
            }
        }
    return redirect()->route('cart')->cookie(md5($user->loginUser), serialize($cart), (time() + 2592000));
    }
}
