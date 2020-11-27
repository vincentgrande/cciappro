@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/admin.css">
<link rel="stylesheet" href="./CSS/parametres.css">
<script src="./JS/admin.js"></script>
<script src="./JS/jquery.min.js"></script>
@stop

@section('content')
<section class="div-third center nav2">
                <div class="div-btn">
                    <button class="btn" onclick="show('modifMdp');">Modifier un mot de passe</button>
                </div>
                <div class="div-btn">
                    <button class="btn" onclick="show('supprUtil');">Supprimer un utilisateur</button>
                </div>
                <div class="div-btn">
                    <button class="btn" onclick="show('modifUser');">Modifier le satut d'un utilisateur</button>
                </div>
            </section>
            <section class="center admin" id="modifMdp">
                <h2 class="page-title">Changer un mot de passe</h2>
                <form class="formulaire dp-block" id="form-co" method="POST" action="{{route('modifMdp')}}">
                {{ csrf_field() }}
                    <label for="">ID Utilisateur :</label><br>
                    <input class="input-form" type="number" name="idUser"><br>
                    <label for="">Nom :</label><br>
                    <input class="input-form" type="text" name="nomUser"><br>
                    <label for="">Prénom :</label><br>
                    <input class="input-form" type="text" name="prenomUser"><br>
                    <label for="">Adresse mail :</label><br>
                    <input class="input-form" type="mail" name="mailUser"><br>
                    <label for="">Entrez le nouveau mot de passe :</label><br>
                    <input class="input-form" type="password" name="newMdpUser"><br>
                    <input class="btn-submit" type="submit" value="Modifier">
                </form>
            </section>
            <section class="center admin" id="supprUtil">
                <h2 class="page-title">Supprimer un utilisateur</h2>
                <form class="formulaire dp-block" id="form-co" method="POST" action="{{route('supprUser')}}">
                {{ csrf_field() }}
                    <label for="">ID Utilisateur :</label><br>
                    <input class="input-form" type="number" name="idUser"><br>
                    <label for="">Nom :</label><br>
                    <input class="input-form" type="text" name="nomUser"><br>
                    <label for="">Prénom :</label><br>
                    <input class="input-form" type="text" name="prenomUser"><br>
                    <label for="">Adresse mail :</label><br>
                    <input class="input-form" type="mail" name="mailUser"><br>
                    <input class="btn-submit" type="submit" value="Supprimer">
                </form>
            </section>
            <section class="center admin" id="modifUser">
                <h2 class="page-title">Modifier un utilisateur</h2>
                <form class="formulaire dp-block" id="form-co" method="post" action="{{ route('modifUser') }}">
                {{ csrf_field() }}
                    <label for="">ID Utilisateur :</label><br>
                    <input class="input-form" type="number" name="idUser"><br>
                    <label for="">Nom :</label><br>
                    <input class="input-form" type="text" name="nomUser"><br>
                    <label for="">Prénom :</label><br>
                    <input class="input-form" type="text" name="prenomUser"><br>
                    <label for="">Adresse mail :</label><br>
                    <input class="input-form" type="mail" name="mailUser"><br>
                    <h3>Est administrateur ?</h3><br>
                    <select name="isAdmin" id="isAdmin">
                        <option value="">-- Choisir une option --</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select><br>
                    <input class="btn-submit" type="submit" value="Modifier">
                </form>
</section>
@stop 