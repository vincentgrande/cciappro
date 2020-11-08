@extends('template')

@section('style-js')
<link rel="stylesheet" href="./CSS/cart.css">
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
            </tr>
        </thead>
        <tbody>
        <?php
        use App\Produit;
        if($articles){
            for($i=0;$i<count($articles);$i++){
                $img=Produit::select('imgProduit')->where('nomProduit', '=', $articles[$i]['article'])->get();
                foreach($img as $url){
                    echo "  <tr>
                                <td class='td-margin half-table dp-flex'><img class='img-product' src=$url->imgProduit><p>".$articles[$i]['article']."</p></td>
                                <td class='td-margin quart-table'>".$articles[$i]['quantite']."</td>
                            </tr>";
                }
            }
        }else{
            echo "<tr><td>Votre panier vide</td></tr>";
        }
        ?>
            </tbody>
        </table>
        <button class="envoi">Commander</button>
@stop