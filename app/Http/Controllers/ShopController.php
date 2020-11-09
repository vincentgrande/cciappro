<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\MarqueProduit;
use App\TypeProduit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ShopController extends Controller
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
        return view('shop.shop',[
            'title' => "Shop",
            'user' => "$user->firstname ".strtoupper($user->name),
            'articles' => Produit::all(),
            'marques' => MarqueProduit::all(),
            'types' => TypeProduit::all(),
            'panier'=>$panier,
        ]);
    }
    public function createcookie(Request $request){
        $user = Auth::user();
        $value = Cookie::get(md5($user->loginUser));
        $article=$request->article;
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        $bool=False;
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                if($cart[$i]['article']==$request->article){
                    $cart[$i]['quantite']=intval($cart[$i]['quantite'])+intval($request->quantity);
                    $bool = True;
                }
            }
            if($bool == False){
                $cart[] = array(  
                    'article'		=> $request->article,		
                    'quantite'		=> intval($request->quantity),		// id de l'option de cet article
                );
            }
        }else{
            $cart[] = array(  
                'article'		=> $request->article,		
                'quantite'		=> intval($request->quantity),		// id de l'option de cet article
            );
        }
        return redirect()->route('shop')->cookie(md5($user->loginUser), serialize($cart), (time() + 2592000));
    }
}