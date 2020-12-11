<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\message;
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
        $cart = unserialize($value); 
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        return view('shop.shop',[
            'title' => "Shop",
            'user' => "$user->firstname ".strtoupper($user->name),
            'articles' => Produit::select()->where('isActive','=', 1)->get(),
            'marques' => MarqueProduit::all(),
            'types' => TypeProduit::all(),
            'panier'=>$panier,
            'admin' => $user->isAdmin,
            'message' => message::select()->where('isActive', '=',1)->get(),
        ]);
    }
    public function createcookie(Request $request){
        $user = Auth::user();
        $value = Cookie::get(md5($user->loginUser));
        $article=$request->article;
        $cart = unserialize($value); 
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
                    'idProduit' => $request->idProduit,
                    'article'		=> $request->article,		
                    'quantite'		=> intval($request->quantity),	
                    'img' =>	$request->img,
                );
            }
        }else{
            $cart[] = array(  
                'idProduit' => $request->idProduit,
                'article'		=> $request->article,		
                'quantite'		=> intval($request->quantity),	
                'img' =>	$request->img,
            );
        }
        return redirect()->route('shop')->cookie(md5($user->loginUser), serialize($cart), (time() + 2592000));
    }
}
