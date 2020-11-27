<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class paramController extends Controller
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
            return view('param.paramAdmin', [
                "title"=>"Paramètres administrateur",
                "panier"=>$panier,
                "user" => "$user->firstname ".strtoupper($user->name),
            ]);
        }else{
            return redirect()->route('shop');
        }
        
    }

    public function changePassword(Request $request){

        $user = Auth::user();
        $panier=0;
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        $password = Hash::make($request->newMdpUser);
        
            User::where('id', "=", $request->idUser)
            ->where('name', "=", $request->nomUser)
            ->where('firstname', "=", $request->prenomUser)
            ->where('email', "=", $request->mailUser)
            ->update(['password' => $password]);
            return redirect()->route('parametresadmin');
        
            
        

    }
}
