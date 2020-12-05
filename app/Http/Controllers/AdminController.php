<?php

namespace App\Http\Controllers;
use App\Commande;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
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
}
