<div>
<script type="text/javascript">
   function verif(x){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        var loginUser = $("input[name=loginUser]").val();
        var mail = $("input[name=mail]").val();

   
        $.ajax({
           type:'POST',
           url:"{{ route('verif') }}",
           data:{loginUser:loginUser, email:mail},
           success:function(data){
            $("#"+x).css('color', 'red');
            $("#"+x).val(data.success);
           }
        });
    }
  
	
</script>
    @if($registerForm)
    <section class="dp-flex">
        <div class="btn-mid">
            <button class="btn-connect fnd-blanc btn-left" id="btn-co" wire:click.prevent="register" onclick="resetclass();">
                <p class="btn-co-pink">SE CONNECTER</p>
            </button>
            <button class="btn-connect fnd-bleu btn-right" id="btn-insc" wire:click.prevent="register" onclick="changeclass();">
                <p class="btn-co-pink">S'INSCRIRE</p>
            </button>
        </div>
    </section>
    <div class="fnd-blanc zone-form dp-flex">
        <form class="formulaire dp-block" id="form-insc">
            <label>Nom :</label>
            <input type="text" wire:model="name" class="input-form" placeholder="@error('name'){{ $message }}@enderror">
            <label>Prénom :</label>
            <input type="text" wire:model="firstname" class="input-form" placeholder="">
            <label>Identifiant :</label>
            <input type="text" wire:model="loginUser" id ="loginUser" name="loginUser" class="input-form" onchange="verif('loginUser')">
            <label>Email :</label>
            <input type="text" wire:model="email" id ="mail" class="input-form" name="mail" onchange="verif('mail')" placeholder="@error('email'){{ $message }}@enderror">
            <label>Mot de passe :</label>
            <input type="password" wire:model="password" class="input-form" placeholder="@error('password'){{ $message }}@enderror">
            <label>Département :</label>
            <select class="input-form" name="dptUser" wire:model="dptUser">
                        <option>--Choisir un département--</option>
                        <option value="accueil">Accueil</option>
                        <option value="comptabilite">Comptabilité</option>
            </select>
            <button class="btn-submit" wire:click.prevent="registerStore">S'inscrire</button>
        </form>     
        @if (session()->has('message'))
            {{ session('message') }}
            @endif 
    </div> 
    @else
    <section class="dp-flex">
        <div class="btn-mid">
            <button class="btn-connect fnd-bleu btn-left" id="btn-co" wire:click.prevent="register" onclick="resetclass();">
                <p class="btn-co-pink">SE CONNECTER</p>
            </button>
            <button class="btn-connect fnd-blanc btn-right" id="btn-insc" wire:click.prevent="register" onclick="changeclass();">
                <p class="btn-co-pink">S'INSCRIRE</p>
            </button>
        </div>
    </section>
    <div class="fnd-blanc zone-form dp-flex">

        <form class="formulaire dp-block" id="form-co">
            <label>Identifiant :</label><br>
            <input type="text" wire:model="loginUser" class="input-form" placeholder="@error('loginUser'){{ $message }}@enderror">
            <label>Mot de passe :</label><br>
            <style>
                ::placeholder {color: red;}
            </style>
            <input type="password" wire:model="password" class="input-form" placeholder="@error('password'){{ $message }}@enderror" >
            @if (session()->has('error'))
            {{ session('error') }}
            @endif 
            <br>
            <button class="btn-submit" wire:click.prevent="login">Connexion</button>         
            <a class="link" wire:click="mdpforgot">Mot de passe oublié ?</a><br>
        </form>
        @if($mdpforgot)
        <br>
            <form class='formulaire' id="form-mdp-insc" method='post' action="{{ route('mail') }}">    
                {{ csrf_field() }}
                    <label for="">Adresse e-mail :</label><br>
                    <input class="input-form" type="text" name="mail" id="mail" wire:model="mail"><br>
                    <label for="">Votre message :</label><br>
                    <textarea rows="4" cols="50" name="mess" id="mess" wire:model="mess"></textarea><br>
                    <input class="btn-submit" type="submit" value="Envoyer"><br>   
            </form>
        @else
        @endif
    </div>
    @endif
</div>