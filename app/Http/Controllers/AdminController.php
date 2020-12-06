<?php

namespace App\Http\Controllers;
use App\Commande;
use App\User;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
        $user = Auth::user();
        $panier=0;
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        if($user->isAdmin){
            return view('admin',[
                'title' => 'Administrateur',
                'panier'=>$panier,
                'user' => "$user->firstname ".strtoupper($user->name),
                'admin' => $user->isAdmin,
                'commandes'=>Commande::all(),
                'nbCommandes'=>Commande::select('idCommande')->groupBy('commandes.idCommande')->get(),
                'allusers' => User::all(),
                'attenteValid' => Commande::select('*')->where('idEtat','1')->get(),
                'nbAttenteValid' => Commande::select('idCommande')->where('idEtat','1')->groupBy('commandes.idCommande')->get(),
                'attenteLivraison' => Commande::select('*')->where('idEtat','2')->get(),
                'nbAttenteLivraison' => Commande::select('idCommande')->where('idEtat','2')->groupBy('commandes.idCommande')->get(),

            ]);
        }else{
            return redirect()->route('shop');
        }
        
    }
    public function valideCommande(Request $request){
        $user = Auth::user();
        
        if($user->isAdmin){
            Commande::where('idCommande','=', intval($request->idCommande))->update(['commandes.idEtat'=>2]);
            return redirect()->route('admin');
        }else{
            return redirect()->route('shop');
        }
        
    }
    public function refuserCommande(Request $request){
        $user = Auth::user();
        
        if($user->isAdmin){
            Commande::where('idCommande','=', intval($request->idCommande))->update(['commandes.idEtat'=>4]);
            return redirect()->route('admin');
        }else{
            return redirect()->route('shop');
        }
        
    }
    public function auditerLivraison(Request $request){
        $user = Auth::user();
        
        if($user->isAdmin){
            Commande::where('id','=', intval($request->id))->update(['commandes.idEtat'=>3]);
            $qqt = Produit::select('stockProduit')->where('idProduit', '=', intval($request->idProduit))->get();
            foreach($qqt as $quantite){
                $qqt=intval($quantite->stockProduit)-$request->quantite;
            }
            Produit::where('idProduit', '=', $request->idProduit)->update(['produits.stockProduit'=> $qqt]);
            return redirect()->route('admin');
            
        }else{
            return redirect()->route('shop');
        }
        
    }
}
