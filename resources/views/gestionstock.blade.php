@extends('template')

@section('style-js')

<link rel="stylesheet" href="./CSS/admin.css">
<script src="./JS/jquery.min.js"></script>
<script src="./JS/admin.js"></script>

@stop
@section ('content')
<section class="center admin" id="attValid">
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
                <td><input  type='file' id='avatar' name='avatar' accept='image/png, image/jpeg'></td>
                <td>";
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
@stop