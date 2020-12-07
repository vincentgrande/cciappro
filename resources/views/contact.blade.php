@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/parametres.css">
@stop

@section('content')

    <section class="dp-flex section-parametres">
        <h2 class="page-title">Contacter un administrateur</h2>
        <form class="formulaire dp-block" id="form-co" method="post">
            {{ csrf_field() }}
            <label for="">Sujet :</label><br>
            <input class="input-form" type="text" name="sujet"><br>
            <label for="">Votre message :</label><br>
            <textarea id="mess" name="mess" rows="12" cols="33"></textarea><br>
            <input class="btn-submit" type="submit" value="Envoyer">
        </form>
    </section>
@stop