<?php

namespace App\Http\Controllers;

use App\Etat;
use App\Produit;
use App\typeProduit;
use App\MarqueProduit;
use App\Commande;
use App\Mail\confirmationCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
            'title'=>"Panier",
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
        $bool = False;
        for($i=0; $i<count($cart);$i++){
            if($cart[$i]['article']==$request->article and $bool==False){
                array_splice($cart, $i);
                $bool=True;
            }
        }
    return redirect()->route('cart')->cookie(md5($user->loginUser), serialize($cart), (time() + 2592000));
    }
    //fonction qui envoie le panier du cookie vers la bdd
    public function commander(){
        $user = Auth::user();
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);
        $idCommande = Commande::max('idCommande') + 1;
        for($i=0; $i<count($cart);$i++){ 
            $produit=  Produit::select('idProduit')->where('nomProduit','=',$cart[$i]['article'])->get();
            $etat= Etat::select('idEtat')->where('etat','=','En attente de validation')->get();
            $commande = new Commande;
            $commande->idCommande =$idCommande;
            $commande->quantite = $cart[$i]['quantite'];
            $commande->idProduit = $produit[0]['idProduit'];
            $commande->idEtat =$etat[0]['idEtat'];
            $commande->idUser = $user->id;
            $commande->dateCommande = date("Y-m-d");
            $commande->save();
        }
        $cookie = Cookie::forget(md5($user->loginUser));

        Mail::to($user->email)->send(new confirmationCommande($user->name, $user->firstname, $cart));

        return redirect()->route('shop')->withCookie($cookie);
    }
}

