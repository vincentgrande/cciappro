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
            <tr>
                <td rowspan="3">1</td>
                <td rowspan="3">Beltz Hervé</td>
                <td>Colle UHU</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
                <td rowspan="3"><button>Valider la demande</button></td>
            </tr>
            <tr>
                <td>Ciseau</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
            </tr>
            <tr>
                <td>Règle</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
            </tr>
            <tr>
                <td rowspan="2">2</td>
                <td rowspan="2">Beteta Stéphane</td>
                <td>Masque chirurgical</td>
                <td>50</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
                <td rowspan="3"><button>Valider la demande</button></td>
            </tr>
            <tr>
                <td>PC Windows 10</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
            </tr>
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
            <tr>
                <td rowspan="2">3</td>
                <td rowspan="2">Courcenet Sandra</td>
                <td>Colle UHU</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:orange;">En attente de livraison</td>
                <td><button>Auditer la livraison</button></td>
            </tr>
            <tr>
                <td>Règle</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:orange;">En attente de livraison</td>
                <td><button>Auditer la livraison</button></td>
            </tr>
            <tr>
                <td rowspan="1">4</td>
                <td rowspan="1">Diemer Michel</td>
                <td>Masque chirurgical</td>
                <td>50</td>
                <td>21/10/2020</td>
                <td style="background-color:orange;">En attente de livraison</td>
                <td><button>Auditer la livraison</button></td>
            </tr>

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