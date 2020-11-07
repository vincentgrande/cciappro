<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\User;
use Illuminate\Http\Request;

class LoginRegister extends Component
{
    public $users, $email, $password, $name, $firstname, $dptUser, $isAdmin, $loginUser, $mail,$mess;
    public $registerForm = false;
    public $mdpforgot = false;
    public $mdpreset = false;

    public function render()
    {
        return view('livewire.login-register');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->firstname = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'loginUser' => 'required',
            'password' => 'required',
        ]);
        if(\Auth::attempt(array('loginUser' => $this->loginUser, 'password' => $this->password))){
            $user = \Auth::user();
            if($user->isAdmin){
                return redirect()->route('admin');
            }else{
                return redirect()->route('shop');
            }
    
        }else{
            session()->flash('error', 'Nom d\'utilisateur ou mot de passe érroné');
        }
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }
    public function mdpforgot()
    {
        $this->mdpforgot = !$this->mdpforgot;
    }
    public function mdpreset(Request $request)
    { 
        $validatedDate = $this->validate([
            'mail' => 'required',
            'mess' => 'required',
        ]);
        return redirect()->route('mail', ['mail' =>$this->mail, 'mess'=> $this->mess]);
    }
    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'firstname'=>'required',
            'email' => 'required|email',
            'password' => 'required',
            'dptUser' => 'required',
            'loginUser' => 'required',
        ]);

        $this->password = Hash::make($this->password); 

        User::create(['name' => $this->name,'firstname' => $this->firstname, 'email' => $this->email,'password' => $this->password, 'dptUser' => $this->dptUser, 'loginUser' => $this->loginUser, 'isAdmin' => $this->isAdmin]);

        session()->flash('message', 'Your register successfully Go to the login page.');

        $this->resetInputFields();

    }
}