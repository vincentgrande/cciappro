<?php


namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Cookie;
use App\Commande;

class UserController extends Controller
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
        return view('user',[
            'title'=>"Historique de commandes",
            'user' => "$user->firstname ".strtoupper($user->name),
            'panier'=>$panier,
            'commandes'=>Commande::where('idUser', '=', $user->id)->get(),
            'nbCommandes'=>Commande::select('idCommande')->where('idUser', '=', $user->id)->groupBy('commandes.idCommande')->get(),
            'admin' => $user->isAdmin,
        ]);
 
        
    }

    public function contact(){
        $user = Auth::user();
        $panier=0;
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        return view('contact',[
            'title'=>"Contact",
            'user' => "$user->firstname ".strtoupper($user->name),
            'panier'=>$panier,
            'admin' => $user->isAdmin,
        ]);
 
        
    }

    public function contactEnvoi(Request $request){
        $user = Auth::user();
        $admin="vincent.grande@outlook.fr"; 
        Mail::to($admin)->send(new contact($request->sujet, $user->name, $user->firstname, $request->mess));
       return redirect()->route('contact');
    }
}
