<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        Mail::to($request->mail)->send(new PassReset($request->mail,$request->mess)); //on mettre Mail::to('adressedesservicesgeneraux')
        Mail::to($request->mail)->send(new PassResetConfirm($request->mail,$request->mess));
        return redirect()->route('login');
    }
    public function logout(){
       auth()->logout();
       return redirect()->route('login');
    }
}
