<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\MarqueProduit;
use App\TypeProduit;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('shop.shop',[
            'title' => "Shop",
            'user' => "$user->firstname ".strtoupper($user->name),
            'articles' => Produit::all(),
            'marques' => MarqueProduit::all(),
            'types' => TypeProduit::all(),
        ]);
    }
}
