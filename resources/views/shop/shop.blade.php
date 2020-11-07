@extends('template')

@section('style-js')
<script src="./JS/jquery.min.js"></script>
<script src="./JS/shop.js"></script>
<link rel="stylesheet" href="./CSS/shop.css">
@stop

@section('content')
<div class="div-shop">
    <div class="div-third searchbar">
        <div>
            <select class="select-size" name="marque" id="marque" onchange="select('marque')">
                <option value="" style="padding-right:10px;">Marque</option>
                @foreach ($marques as $marque)
                <option value="{{ $marque->marqueProduit }} ">{{ $marque->marqueProduit }}</option>
                @endforeach

            </select>
        </div>
        <div>
            <select name="type" class="select-size select" id="type" onchange="select('type')">
                <option value="">Type</option>
                @foreach ($types as $type)
                <option value="{{ $type->typeProduit }} ">{{ $type->typeProduit }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <form>
                <input class="select-size select" type="text" placeholder="Recherche &#x1F50D;" id="searchbar"
                    style="font-weight: bold;font-size:1em;">
            </form>
        </div>
    </div>
    <div id="recherche"></div>
    <div class="div-third articles">
        <?php
            $i=0;
            foreach($articles as $article){
                $i++;
                echo "
                    <div class='div-produit ".$article->marque->marqueProduit." ". $article->type->typeProduit."'>
                        <!-- ID = nomProduit (venu de la DB)-->
                        <h3 class='center-bis'>$article->nomProduit</h3><!-- Titre = nomProduit (venu de la DB)-->
                        <a class='dp-flex' href='#ex$i' rel='modal:open'><img class='center-bis' src='$article->imgProduit' width='100px' height='100px'></a><!-- src = imgProduit (venu de la DB)-->
                        <form class='dp-flex'>
                            <input class='center-bis btnpanier' type='submit' value='Ajouter au panier'>
                            <input class='center-bis' type='number' id='quantity' name='quantity' min='1' max='5' value='1'>
                        </form>
                    </div>
                    <div id='ex$i' class='modal' style='height:auto;'>
                        <h2 class='titre-modal'>$article->nomProduit</h2><br>
                        <div class='modal-content' style='border:none;'>
                            <img class='img-modal' src='$article->imgProduit' width='200px' height='200px' alt='Image from database'>
                            <p>Marque : ".$article->marque->marqueProduit."<p>
                            <p>$article->descProduit</p>
                        </div>
                    </div>"; 
                if(($i/3)==floor($i/3)){
                    echo "</div><div class='div-third articles'>";
                }
            }
            if(($i/3) != floor($i/3)){
                echo "
                  <div class='div-produit'>
                      <h3 class='center-bis'></h3>
                      <a class='dp-flex'  rel='modal:open'><img class='center-bis' src='./img/blanc.jpg' width='100px' height='100px'></a><!-- src = imgProduit (venu de la DB)-->
                      
                  </div>";
            }
        ?>



    </div>
</div>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
@stop