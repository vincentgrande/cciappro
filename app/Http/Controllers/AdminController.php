<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(){
        $user = Auth::user();
        if($user->isAdmin){
            return view('hw');
        }else{
            return redirect()->route('shop');
        }
        
    }
}
