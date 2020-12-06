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
                <td>Supprimer produit</td>
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
                                <form method='post' action='/supprimerProduit'>";
                                ?>{{ csrf_field() }}<?php 
                                echo"
                                    <input type='submit' value='Supprimer'></input>
                                    <input type='text' value='$produit->idProduit' name='idProduit' style='display:none'>
                                </form></td>
            </tr>";
            }


?>
        
        </tbody>
    </table>
</section>
@stop