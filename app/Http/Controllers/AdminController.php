<?php

namespace App\Http\Controllers;
use App\Commande;
use App\User;
use App\Produit;
use App\message;
use App\TypeProduit;
use App\MarqueProduit;
use App\Mail\validerCommande;
use App\Mail\refuserCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $cart = Commande::select()->join('produits', 'commandes.idProduit', '=', 'produits.idProduit')->where('idCommande', intval($request->idCommande))->get();
            Mail::to($request->email)->send(new validerCommande($request->name, $request->firstName, $cart));
            return redirect()->route('admin');
            
        }else{
            return redirect()->route('shop');
        }
        
    }
    public function refuserCommande(Request $request){
        $user = Auth::user();
        
        if($user->isAdmin){
            Commande::where('idCommande','=', intval($request->idCommande))->update(['commandes.idEtat'=>4]);
            $cart = Commande::select()->join('produits', 'commandes.idProduit', '=', 'produits.idProduit')->where('idCommande', intval($request->idCommande))->get();
            Mail::to($request->email)->send(new refuserCommande($request->name, $request->firstName, $cart));
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
    public function gestionstock(){
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
            return view('gestionstock',[
                'title' => 'Gestion des stocks',
                'panier'=>$panier,
                'user' => "$user->firstname ".strtoupper($user->name),
                'admin' => $user->isAdmin,
                'produits' => Produit::all(),
                'marques' => MarqueProduit::all(),
                'types' => TypeProduit::all(),
            ]);
        }else{
            return redirect()->route('shop');
        }
        
    }
    public function modifierQqtProduit(Request $request){
        $user = Auth::user();
        
        if($user->isAdmin){
            $qqt = Produit::select('stockProduit')->where('idProduit', '=', intval($request->idProduit))->get();
            foreach($qqt as $quantite){
                $qqt=intval($quantite->stockProduit)+$request->quantite;
            }
            Produit::where('idProduit','=', intval($request->idProduit))->update(['produits.stockProduit'=>$qqt]);
            return redirect()->route('gestionStock');
        }else{
            return redirect()->route('shop');
        }
        
    }
    public function visibiliteProduit(Request $request){
        $user = Auth::user();
        
        if($user->isAdmin){
            
            Produit::where('idProduit','=', intval($request->idProduit))->update(['produits.isActive'=>intval($request->visibilite)]);
            return redirect()->route('gestionStock');
        }else{
            return redirect()->route('shop');
        }
        
    }
   
    public function imgUpload(Request $request)
    {
        if($request->file())
        {
            $save = $request->file('file')->store('public/shopimg');
            Produit::where('idProduit','=', intval($request->idProduit))->update(['produits.imgProduit'=>'./storage/shopimg/'.$request->file->hashName()]);
            return redirect()->route('gestionStock');
        }
        else
        {
            return redirect()->route('gestionStock');
        } 
    }

    public function ajoutProduit(Request $request)
    {
        if($request->file())
        {
            $save = $request->file('file')->store('public/shopimg');
            $produit = new Produit;
            $produit->nomProduit = $request->nomProduit;
            $produit->descProduit = $request->descProduit;
            $produit->stockProduit = intval($request->stockProduit);
            $produit->imgProduit = './storage/shopimg/'.$request->file->hashName();
            $produit->idMarqueProduit = $request->marque;
            $produit->idTypeProduit = $request->type;
            $produit->isActive= 1;
            $produit->save();
            return redirect()->route('gestionStock');
        }
        else
        {
            return redirect()->route('gestionStock');
        } 
    }
   
    public function ajoutType(Request $request)
    {
        $type = new TypeProduit;
        $type->typeProduit = $request->nomType;
        $type->save();
        return redirect()->route('gestionStock');
    }

    public function ajoutMarque(Request $request)
    {
        $marque = new MarqueProduit;
        $marque->marqueProduit = $request->nomMarque;
        $marque->save();
        return redirect()->route('gestionStock');
    }

    public function message(){
        $user = Auth::user();
        $panier=0;
        $value = Cookie::get(md5($user->loginUser));
        $cart = unserialize($value);  // je recupère les possibles articles déjà dans le panier
        if(gettype($cart)=="array"){
            for($i=0;$i<count($cart);$i++){
                $panier=$panier+intval($cart[$i]['quantite']);
            }
        }
        return view('message',[
            'title' => 'Publier un message',
            'panier'=>$panier,
            'user' => "$user->firstname ".strtoupper($user->name),
            'admin' => $user->isAdmin,
            
        ]);
    }

    public function publierMessage(Request $request){
        $message = new message;
        $message->message = $request->mess;
        $message->isActive = 1;
        $message->save();
        return redirect()->route('message');
    }
}
