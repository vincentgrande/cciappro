@extends('template')

@section('style-js')
<script src="./JS/jquery.min.js"></script>
<script src="./JS/user.js"></script>
<link rel="stylesheet" href="./CSS/user.css">
@stop
@section ('content')

<section class="fin-section section-content">
    <table class="table-commande">
        <thead>
            <tr class="tr-title">
                <th class="child-section">Mon historique de commande</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tr-statut">
                <td class="td-margin half-table">Produits</td>
                <td class="td-margin quart-table">Date de commande</td>
                <td class="quart-table">Statut</td>
                <td class="min-table"></td>
            </tr>
            <?php
           
                foreach($nbCommandes as $nbCommande){
                    echo "<tr class='tr-commande'>
                            <td class='td-margin half-table'>";
                            foreach($commandes as $commande){
                                if($commande->idCommande == $nbCommande->idCommande){
                                    echo " ".$commande->quantite."x ".$commande->produit->nomProduit;
                                    
                                }
                            }
                            echo "</td><td class='td-margin quart-table'>";
                            $bool=False;
                            foreach($commandes as $commande){
                                if($commande->idCommande == $nbCommande->idCommande && $bool==False){
                                    echo $commande->dateCommande;
                                    $bool=True;
                                }
                            }
                            echo"</td>
                            <td class='quart-table livre'></td>
                            <td class='min-table'><i onclick='showInfo(".$nbCommande->idCommande.");' class='fas fa-angle-down'></i></td>
                        </tr>";
                    echo "<tr class='tr-info dp-none' id='".$nbCommande->idCommande."'>
                            <td class=''>";
                            foreach($commandes as $commande){
                                if($commande->idCommande == $nbCommande->idCommande){
                                    echo "<p><img class='info-img' src=".$commande->produit->imgProduit." alt=''></p>";
                                }
                            }
                          

                        echo '</td><td class="quart-table td-noauto">';
                        foreach($commandes as $commande){
                            if($commande->idCommande == $nbCommande->idCommande){
                                echo "<p class='info-txt'>".$commande->produit->nomProduit."</p>";
                            }
                        }
                        echo '</td>
                              <td class="min-table td-noauto">';       
                        foreach($commandes as $commande){
                            if($commande->idCommande == $nbCommande->idCommande){
                                echo "<p class='info-txt' style='"; 
                                if($commande->etat->etat == "Livré"){
                                    echo "color:green;";
                                }else if($commande->etat->etat == "Refusé"){
                                    echo "color:red;";
                                }
                                else if($commande->etat->etat == "En attente de validation" || $commande->etat->etat == "En cours livraison"){
                                    echo "color:orange;";
                                }
                                echo"'>".$commande->etat->etat."</p>";
                            }
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