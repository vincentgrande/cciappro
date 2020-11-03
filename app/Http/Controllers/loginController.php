<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function logout(){
       auth()->logout();
       return redirect()->route('login');
    }
}
