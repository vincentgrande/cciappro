@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/admin.css">
<script src="./JS/jquery.min.js"></script>
<script src="./JS/admin.js"></script>
@stop

@section('content')
<section class="div-third center nav2">
    <div class="div-btn">
        <button class="btn" onclick="show('attValid');">En attente de validation</button>
    </div>
    <div class="div-btn">
        <button class="btn" onclick="show('attLivr');">En attente de livraison</button>
    </div>
    <div class="div-btn">
        <button class="btn" onclick="show('historique');">Historique des commandes</button>
    </div>
    <div class="div-btn">
        <button class="btn" onclick="show('gestionUtil');">Gestion utilisateur</button>
    </div>
</section>
<section class="center admin" id="attValid">
    <table>
        <thead>
            <tr>
                <td>ID commande</td>
                <td>Demandeur</td>
                <td>Articles</td>
                <td>Quantité</td>
                <td>Date de commande</td>
                <td>Statut commande</td>
                <td>Validation</td>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($nbAttenteValid as $nbCommande){
                $count=0;
                foreach($attenteValid as $commande){
                    if($nbCommande->idCommande == $commande->idCommande ){
                        $count=$count+1;
                    }}
                echo "<tr>";
                    echo"
                    <td rowspan='".$count."'>";
                    $bool = False;
                    foreach($attenteValid as $commande){
                        if($nbCommande->idCommande == $commande->idCommande && $bool == False){
                            echo $commande->idCommande;
                            $bool = True;
                            echo "</td>
                                  <td rowspan='".$count."'>".$commande->user->name." ".$commande->user->firstname."</td>";
                        }
                    }
                    $test=False;
                    foreach($attenteValid as $commande){
                        if($nbCommande->idCommande == $commande->idCommande ){
                            echo"
                            <td>".$commande->produit->nomProduit."</td>
                            <td>".$commande->quantite."</td>
                            <td>".$commande->dateCommande."</td>
                            <td style='background-color:";
                            if($commande->etat->etat == "En attente de validation" || $commande->etat->etat == "En cours livraison"){
                                echo "red";
                            }
                            echo ";'>".$commande->etat->etat."</td>";
                            if ($test == False)
                            {
                                $test=True;
                                echo "<td rowspan='".$count."'>";
                                echo "
                                <form method='post'>";
                                ?>{{ csrf_field() }}<?php 
                                echo"
                                    <input type='submit' value='Valider la commande'></input>
                                    <input type='text' name='email' value='".$commande->user->email."' style='display:none'></input>
                                    <input type='text' name='name' value='".$commande->user->name."' style='display:none'></input>
                                    <input type='text' name='firstName' value='".$commande->user->firstname."' style='display:none'></input>
                                    <input type='text' value='$commande->idCommande' name='idCommande' style='display:none'>
                                </form>";
                                echo "
                                <form method='post' action='/admin3'>";
                                ?>{{ csrf_field() }}<?php 
                                echo"
                                    <input type='submit' value='Refuser la commande'></input>
                                    <input type='text' name='email' value='".$commande->user->email."' style='display:none'></input>
                                    <input type='text' name='name' value='".$commande->user->name."' style='display:none'></input>
                                    <input type='text' name='firstName' value='".$commande->user->firstname."' style='display:none'></input>
                                    <input type='text' value='$commande->idCommande' name='idCommande' style='display:none'>
                                </form></td>";   
                            }
                            echo"</tr>";
                        }
                    } 
                   
                   
            }
        ?>
        </tbody>
    </table>
</section>
<section class="center admin" id="attLivr">
    <table>
        <thead>
            <tr>
                <td>ID commande</td>
                <td>Demandeur</td>
                <td>Articles</td>
                <td>Quantité</td>
                <td>Date de commande</td>
                <td>Statut commande</td>
                <td>Validation</td>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($nbAttenteLivraison as $nbCommande){
                $count=0;
                echo "<tr>";
                foreach($attenteLivraison as $commande){
                    if($nbCommande->idCommande == $commande->idCommande ){
                        $count=$count+1;
                    }}
                    echo"
                    <td rowspan='".$count."'>";
                    $bool = False;
                    foreach($attenteLivraison as $commande){
                        if($nbCommande->idCommande == $commande->idCommande && $bool == False){
                            echo $commande->idCommande;
                            $bool = True;
                            echo "</td>
                                  <td rowspan='".$count."'>".$commande->user->name." ".$commande->user->firstname."</td>";
                        }
                    }
                    foreach($attenteLivraison as $commande){
                        if($nbCommande->idCommande == $commande->idCommande ){
                            echo"
                            <td>".$commande->produit->nomProduit."</td>
                            <td>".$commande->quantite."</td>
                            <td>".$commande->dateCommande."</td>
                            <td style='background-color:";
                            if($commande->etat->etat == "En attente de validation" || $commande->etat->etat == "En cours livraison"){
                                echo "orange";
                            }
                            echo ";'>".$commande->etat->etat."</td>";
                            echo" <td>";
                            echo "
                                <form method='post' action='/admin2'>";
                                ?>{{ csrf_field() }}<?php 
                                echo"
                                    <input type='submit' value='Auditer la livraison'></input>
                                    <input type='text' value='$commande->id' name='id' style='display:none'>
                                    <input type='text' value='".$commande->produit->idProduit."' name='idProduit' style='display:none'>
                                    <input type='text' value='".$commande->quantite."' name='quantite' style='display:none'>
                                </form></td>";
                            echo"</tr>";
                        }
                    }    
            }
            ?>
        </tbody>
    </table>
</section>
<section class="center admin" id="historique">
    <table>
        <thead>
            <tr>
                <td>ID commande</td>
                <td>Demandeur</td>
                <td>Articles</td>
                <td>Quantité</td>
                <td>Date de commande</td>
                <td>Statut commande</td>

            </tr>
        </thead>
        <tbody>
        <?php
            foreach($nbCommandes as $nbCommande){
                $count=0;
                foreach($commandes as $commande){
                    if($nbCommande->idCommande == $commande->idCommande ){
                        $count=$count+1;
                    }}
                echo "<tr>
                    <td rowspan='".$count."'>";
                    $bool = False;
                    foreach($commandes as $commande){
                        if($nbCommande->idCommande == $commande->idCommande && $bool == False){
                            echo $commande->idCommande;
                            $bool = True;
                            echo "</td>
                                  <td rowspan='".$count."'>".$commande->user->name." ".$commande->user->firstname."</td>";
                        }
                    }
                    foreach($commandes as $commande){
                        if($nbCommande->idCommande == $commande->idCommande ){
                            echo"
                            <td>".$commande->produit->nomProduit."</td>
                            <td>".$commande->quantite."</td>
                            <td>".$commande->dateCommande."</td>
                            <td style='background-color:";
                            if($commande->etat->etat == "Livré"){
                                echo "green";
                            }else if($commande->etat->etat == "Refusé"){
                                echo "red";
                            }
                            else if($commande->etat->etat == "En attente de validation" || $commande->etat->etat == "En cours livraison"){
                                echo "orange";
                            }
                            echo ";'>".$commande->etat->etat."</td>
                        </tr>";
                        }
                    }
                   
            }
        ?>
            
            
        </tbody>
    </table>
</section>
<section class="center admin" id="gestionUtil">
    <form>
        <input class="select-size select" type="text" placeholder="Recherche &#x1F50D;" id="searchbar"
            style="font-weight: bold;font-size:1em;">
    </form>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Nom d'utilisateur</td>
                <td>Mail</td>
                <td>Département</td>
                <td>Est admin</td>
                <td>Modifications</td>
            </tr>
        </thead>
        <tbody>

        <?php 

        foreach($allusers as $userlist){
            echo "
            <tr>
                <td>".$userlist->id."</td>
                <td>".$userlist->name."</td>
                <td>".$userlist->firstname."</td>
                <td>".$userlist->loginUser."</td>
                <td>".$userlist->email."</td>
                <td>".$userlist->dptUser."</td>
                <td>".$userlist->isAdmin."</td>
                <td><a href='/parametresadmin&".$userlist->id."&".$userlist->name."&".$userlist->firstname."&".$userlist->email."'><button>Modifier</button></a></td>
            </tr>";
        }
        
        ?>
        </tbody>
    </table>
</section>
@stop