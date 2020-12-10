@extends('template')

@section('style-js')

<link rel="stylesheet" href="./CSS/admin.css">
<script src="./JS/jquery.min.js"></script>
<script src="./JS/admin.js"></script>
<script src="./JS/stock.js"></script>
@stop
@section ('content')
<section class="div-twice center nav2">
    <div class="div-btn">
        <button class="btn" onclick="show('stock');">Gérer les produits</button>
    </div>
    <div class="div-btn">
        <button class="btn" onclick="show('addProduct');">Ajouter un produit</button>
    </div>
    <div class="div-btn">
        <button class="btn" onclick="show('addTypeMarque');">Ajouter une marque/un type</button>
    </div>
</section>
<section class="center admin" id="stock">
    <table>
        <thead>
            <tr>
                <td>Image produit</td>
                <td>ID produit</td>
                <td>Nom produit</td>
                <td>Stock</td>
                <td>Ajouter/retirer du stock</td>
                <td>Changer l'image</td>
                <td>Activer/Désactiver produit</td>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($produits as $produit)
            {
                echo "<tr>
                <td><img style='width:30%;' src='".$produit->imgProduit."'/></td>
                <td>".$produit->idProduit."</td>
                <td>".$produit->nomProduit."</td>
                <td>".$produit->stockProduit."</td>
                <td>";
                echo "
                                <form method='post' action='/modifierQqtProduit'>";
                                ?>{{ csrf_field() }}<?php 
                                echo"
                                    <input type='number' value='0' name='quantite' style='width: 50%; border:inherit;'>
                                    <input type='submit' value='Modifier'></input>
                                    <input type='text' value='$produit->idProduit' name='idProduit' style='display:none'>
                                </form>
                </td>
                <td>
                <form id='".$produit->idProduit."' method='post' action='/imgupload' enctype='multipart/form-data'>";
                ?>{{ csrf_field() }}
                <?php 

                 echo "<input onchange=uploadImg('$produit->idProduit') type='file' id='file' name='file'>";
                
                echo "<input type='text' value='$produit->idProduit' name='idProduit' style='display:none'></form></td><td>";
                echo "
                                <form method='post' action='/visibiliteProduit'>";
                                ?>{{ csrf_field() }}<?php 
                                if($produit->isActive == 1){
                                    echo "<input type='text' value='0' name='visibilite' style='display:none'><input type='submit' value='Désactiver'></input>";
                                }else if($produit->isActive == 0){
                                    echo "<input type='text' value='1' name='visibilite' style='display:none'><input type='submit' value='Activer'></input>";
                                }
                                echo"<input type='text' value='$produit->idProduit' name='idProduit' style='display:none'>
                                </form></td>
            </tr>";
            }


?>
        
        </tbody>
    </table>
</section>

<section class="center admin" id="addProduct">
    <form class="formulaire dp-block" id="form-co" method="POST" enctype='multipart/form-data' action="/ajoutProduit">
        {{ csrf_field() }}
        <label for="">Nom du produit :</label><br><br>
        <input class="input-form" type="text" name="nomProduit" required><br>
        <label for="">Description du produit :</label><br><br>
        <input class="input-form" type="text" name="descProduit" required><br>
        <label for="">Image du produit :</label><br><br>
        <input type='file' id='file' name='file'><br>
        <br><label for="">Marque du produit :</label><br><br>
        <select class="select-size" name="marque" id="marque" required>
            <option value="" style="padding-right:10px;">Marque</option>
            @foreach ($marques as $marque)
            <option value="{{ $marque->idMarqueProduit }} ">{{ $marque->marqueProduit }}</option>
            @endforeach
        </select><br>
        <br><label for="">Type de produit :</label><br><br>
        <select name="type" class="select-size select" id="type" required>
            <option value="">Type</option>
            @foreach ($types as $type)
            <option value="{{ $type->idTypeProduit }} ">{{ $type->typeProduit }}</option>
            @endforeach
        </select><br><br>
        <label for="">Stock :</label><br><br>
        <input class="input-form" type="number" name="stockProduit" required><br>
        <input class="btn-submit" type="submit" value="Modifier">
    </form>
</section>

<section class="center admin" id="addTypeMarque">
    <form class="formulaire dp-block" id="form-co" method="POST" action="/ajoutType">
        {{ csrf_field() }}
        <h2>Ajouter un type</h2>
        <label for="">Nom du type :</label><br><br>
        <input class="input-form" type="text" name="nomType" required><br>
        <input class="btn-submit" type="submit" value="Modifier">
    </form>
    <form class="formulaire dp-block" id="form-co" method="POST" action="/ajoutMarque">
        {{ csrf_field() }}
        <h2>Ajouter une marque</h2>
        <label for="">Nom de la marque :</label><br><br>
        <input class="input-form" type="text" name="nomMarque" required><br>
        <input class="btn-submit" type="submit" value="Modifier">
    </form>
</section>
@stop