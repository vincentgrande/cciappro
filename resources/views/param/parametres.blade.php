@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/parametres.css">
@stop

@section('content')
    <section class="dp-flex section-parametres">
        <h2 class="page-title">Changez votre mot de passe</h2>
        <form class="formulaire dp-block" id="form-co" method="post">
            {{ csrf_field() }}
            <label for="">Entrez votre ancien mot de passe :</label><br>
            <input class="input-form" type="password" name="oldPass"><br>
            <label for="">Entrez votre nouveau mot de passe :</label><br>
            <input class="input-form" type="password" name="newPassOne"><br>
            <label for="">Confirmez votre nouveau mot de passe :</label><br>
            <input class="input-form" type="password" name="newPassTwo"><br>
            <input class="btn-submit" type="submit" value="Envoyer">
        </form>
    </section>
@stop