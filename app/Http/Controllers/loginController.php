<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use App\User;
use App\Mail\PassReset;
use App\Mail\PassResetConfirm;

class loginController extends Controller
{
    
    public function index(){
        $user = Auth::user();
        
        if($user->isAdmin){
            return view('admin', [
                'nom'=> "$user->name $user->firstname",
                'admin'=> "OUI IL EST ADMIN",
            ]);
        }else{
            return view('hw', [
                'nom'=> "$user->name $user->firstname",
                'admin'=> "NON IL EST PAS ADMIN",
            ]);
        }
    }
    public function passreset(Request $request){
        if(User::where('email', '=', $request->mail)->count()==1){
            Mail::to($request->mail)->send(new PassReset($request->mail,$request->mess)); //on mettre Mail::to('adressedesservicesgeneraux')
            Mail::to($request->mail)->send(new PassResetConfirm($request->mail,$request->mess));
            return redirect()->route('login');
        } else{
            return redirect()->route('login');
        }
    }
    public function logout(){
       auth()->logout();
       return redirect()->route('login');
    }
    public function parametres(){
        $user = Auth::user();
        $panier=0;
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        return view('param.parametres',[
            'title'=>"Paramètres",
            'user' => "$user->firstname ".strtoupper($user->name),
            'panier'=>$panier,
            'admin' => $user->isAdmin,
        ]);

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
        $password = Hash::make($request->newPassTwo);
        if(Hash::check($request->oldPass, auth()->user()->password) && $request->newPassOne == $request->newPassTwo){
            User::where('id', "=", $user->id)
            ->where('loginUser', "=", $user->loginUser)
            ->update(['password' => $password]);
            return redirect()->route('shop');
        }else{
            return view('param.parametres',[
                'title'=>"Paramètres",
                'user' => "$user->firstname ".strtoupper($user->name),
                'panier'=>$panier,
                'error' => "Ancien mot de passe érroné ou nouveau mot de passe érroné",
                'admin' => $user->isAdmin,
            ]);
        }
        
    }
    public function verif(Request $request)
    {
        $input = $request->all();
        if($input['loginUser']){
            $user = User::select()->where("loginUser","=",$input['loginUser'])->get();
            foreach($user as $login){
                if($login->loginUser == $input['loginUser']){
                    return response()->json(['success'=>'Nom d\'utilisateur déjà utilisé.']);
                }
            }
        }
        if($input['email']){
            $user = User::select()->where("email","=",$input['email'])->get();
            foreach($user as $mail){
                if($mail->email == $input['email']){
                    return response()->json(['success'=>'Mail déjà utilisé.']);
                }
            }
        }
        
    }
}
