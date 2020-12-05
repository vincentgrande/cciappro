<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Hash;
use App\User;
class paramController extends Controller
{
    public function admin(){
        $user = Auth::user();
        if($user->isAdmin){
            $panier=0;
            $value = Cookie::get(md5($user->loginUser));
            $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
            if(gettype($cart)=="array"){
                for($i=0;$i<count($cart);$i++){
                    $panier=$panier+intval($cart[$i]['quantite']);
                }
            }
            return view('param.paramAdmin', [
                    "title"=>"Paramètres administrateur",
                    "panier"=>$panier,
                    "user" => "$user->firstname ".strtoupper($user->name),
                    'admin' => $user->isAdmin,
                ]);
        }else{
            return redirect()->route('shop');
        }
    }
    public function adminWithParametres($id, $name, $firstname, $mail){
        $user = Auth::user();
        if($user->isAdmin){
            $panier=0;
            $value = Cookie::get(md5($user->loginUser));
            $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
            if(gettype($cart)=="array"){
                for($i=0;$i<count($cart);$i++){
                    $panier=$panier+intval($cart[$i]['quantite']);
                }
            }
            return view('param.paramAdmin', [
                    "title"=>"Paramètres administrateur",
                    "panier"=>$panier,
                    "user" => "$user->firstname ".strtoupper($user->name),
                    'admin' => $user->isAdmin,
                    'id' => $id,
                    'name' => $name,
                    'firstname' => $firstname,
                    'mail' => $mail,
                ]);
        }else{
            return redirect()->route('shop');
        }
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        if($user->isAdmin){
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
        }else{
            return redirect()->route('shop');
        }
    }
    public function supprUser(Request $request){
        $user = Auth::user();
        if($user->isAdmin){
            $panier=0;
            $value = Cookie::get(md5($user->loginUser));
            $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
            if(gettype($cart)=="array"){
                for($i=0;$i<count($cart);$i++){
                    $panier=$panier+intval($cart[$i]['quantite']);
                }
            }
            User::where('id', "=", $request->idUser)
            ->where('name', "=", $request->nomUser)
            ->where('firstname', "=", $request->prenomUser)
            ->where('email', "=", $request->mailUser)
            ->delete();
            return redirect()->route('parametresadmin');
        }else{
            return redirect()->route('shop');
        }
    }

    public function modifUser(Request $request){
        $user = Auth::user();
        if($user->isAdmin){
            $panier=0;
            $value = Cookie::get(md5($user->loginUser));
            $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
            if(gettype($cart)=="array"){
                for($i=0;$i<count($cart);$i++){
                    $panier=$panier+intval($cart[$i]['quantite']);
                }
            }
            User::where('id', "=", $request->idUser)
                ->where('name', "=", $request->nomUser)
                ->where('firstname', "=", $request->prenomUser)
                ->where('email', "=", $request->mailUser)
                ->update(['isAdmin' => $request->isAdmin]);
            return redirect()->route('parametresadmin');
        }else{
            return redirect()->route('shop');
        }
    }
}
