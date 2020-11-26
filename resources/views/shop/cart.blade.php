@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/cart.css">
<script src="./JS/cart.js"></script>
<script src="./JS/jquery.min.js"></script>

@stop

@section('content')
    <table>
        <thead>
            <tr>
                <th class="child-section">Mon panier</th>
            </tr>
            <tr>
                <td class="td-margin half-table">Produit</td>
                <td class="td-margin quart-table">Quantité</td>
                <td class="td-margin quart-table"></td>
            </tr>
        </thead>
        <tbody>
        <?php
        if($articles){
            for($i=0;$i<count($articles);$i++){
                $id=$articles[$i]['idProduit'];
                $onchange="updateCookie('".$id."')";
                    echo "  <tr>
                                <td class='td-margin half-table dp-flex'><img class='img-product' src=".$articles[$i]['img']."><p>".$articles[$i]['article']."</p></td>
                                <td class='td-margin quart-table'>
                                <form action='/modifcart' method='post' id='$id'>";?>
                                {{ csrf_field() }}<?php 
                                echo"
                                <input type='number' onchange=$onchange  name='quantite' value=".$articles[$i]['quantite'].">
                                <input type='text' value='".$articles[$i]['article']."' name='article' style='display:none;'>
                                </form>
                                </td>
                                <td><form method='post'>";
                                ?>{{ csrf_field() }}<?php 
                                echo "
                                <input type='text' value='".$articles[$i]['article']."' name='article' style='display:none;'>
                                <button type='submit'>Supprimer du panier</buton>
                                </form>
                                </td>
                            </tr>";
                
            }
        }else{
            echo "<tr><td>Votre panier est vide</td></tr>";
        }
        ?>
            </tbody>
        </table>
    <div style="text-align: center">
        <form action="{{ route('commander') }}" method="post">
            {{ csrf_field() }}
            <button class="envoi">Commander</button>
        </form>
    </div>
@stop