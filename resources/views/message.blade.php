@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/parametres.css">
@stop

@section('content')

    <section class="dp-flex section-parametres">
        <h2 class="page-title">Publier un message</h2>
        <form class="formulaire dp-block" id="form-co" method="post" action="/message">
            {{ csrf_field() }}
            <label for="">Votre message :</label><br>
            <textarea id="mess" name="mess" rows="12" cols="33"></textarea><br>
            <input class="btn-submit" type="submit" value="Envoyer">
        </form>
        <h2 class="page-title">Désactiver le dernier message<h2>
            <form class="formulaire dp-block" method="post" action="/desactiverMessage">
                {{ csrf_field() }} 
                <p class="old-message">
                    DERNIER MESSAGE : 
                    @foreach ($oldMessage as $message)
                        {{ $message->message }}
                    @endforeach
                </p><br>
                <input class="btn-submit" type="submit" value="Désactiver">
            </form>
    </section>
    
@stop