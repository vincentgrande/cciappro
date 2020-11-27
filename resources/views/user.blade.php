@extends('template')

@section('style-js')
<script src="./JS/jquery.min.js"></script>
<script src="./JS/user.js"></script>
<link rel="stylesheet" href="./CSS/user.css">
@stop
@section ('content')
<?php

foreach($commandes as $commande){
    echo "Login : ". $commande->user->loginUser;
    echo '<br>';
    echo "Produit : ".$commande->produit->nomProduit;
    echo '<br>';
    echo "Etat : ".$commande->etat->etat;
    echo '<br>';
}

?>
<section class="fin-section section-content">
    <table class="table-commande">
        <thead>
            <tr class="tr-title">
                <th class="child-section">Mon historique de commande</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tr-statut">
                <td class="td-margin half-table">Produit</td>
                <td class="td-margin quart-table">Date de commande</td>
                <td class="quart-table">Statut</td>
                <td class="min-table"></td>
            </tr>

            <?php
                foreach($nbCommandes as $nbCommande){
                    echo '<tr class="tr-commande">
                            <td class="td-margin half-table">Fluo 2x, cahier 4x, ciseaux 1x,<br>colle 6x</td>
                            <td class="td-margin quart-table">03/09/2020</td>
                            <td class="quart-table livre">Livré</td>
                            <td class="min-table"><i onclick="showInfoOne();" class="fas fa-angle-down"></i></td>
                        </tr>';
                    echo '<tr class="tr-info dp-none" id="order-one">
                            <td class="">
                                <p><img class="info-img" src="img/fluo.png" alt=""></p>
                                <p><img class="info-img" src="img/cahier.png" alt=""></p>
                                <p><img class="info-img" src="img/ciseaux.png" alt=""></p>
                                <p><img class="info-img" src="img/colle.png" alt=""></p>
                            </td>';

                        echo '<td class="quart-table td-noauto">';
                        foreach($commandes as $commande){
                            echo "<p class='info-txt'>".$commande->produit->nomProduit."</p>";
                        }
                        echo '</td>
                              <td class="min-table td-noauto">';       
                        foreach($commandes as $commande){
                            echo "<p class='livre info-txt'>".$commande->etat->etat."</p>";
                        }
                        echo '</td>
                              <td class="min-table"></td>';  
                }
                    

            ?>
               
            </tr>
        </tbody>
    </table>
</section>

@stop