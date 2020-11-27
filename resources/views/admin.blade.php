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
            <tr>
                <td rowspan="3">1</td>
                <td rowspan="3">Beltz Hervé</td>
                <td>Colle UHU</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
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
            </tr>
            <tr>
                <td>PC Windows 10</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:red;">En attente de validation</td>
            </tr>
            <tr>
                <td rowspan="3">3</td>
                <td rowspan="3">Courcenet Sandra</td>
                <td>Colle UHU</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:orange;">En attente de livraison</td>
            </tr>
            <tr>
                <td>Règle</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:orange;">En attente de livraison</td>
            </tr>
            <tr>
                <td>Surligneur</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:green;">Livré</td>
            </tr>
            <tr>
                <td rowspan="2">4</td>
                <td rowspan="2">Diemer Michel</td>
                <td>Masque chirurgical</td>
                <td>50</td>
                <td>21/10/2020</td>
                <td style="background-color:orange;">En attente de livraison</td>
            </tr>
            <tr>
                <td>Ruban adhésif Scotch</td>
                <td>1</td>
                <td>21/10/2020</td>
                <td style="background-color:green;">Livré</td>
            </tr>
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
                <td>Modifications</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Beltz</td>
                <td>Hervé</td>
                <td>HBELTZ</td>
                <td>hbeltz@ccicampus.fr</td>
                <td>Math</td>
                <td><a href="{{ route('parametresadmin') }}"><button>Modifier</button></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Diemer</td>
                <td>Michel</td>
                <td>MDIEMER</td>
                <td>mdiemer@ccicampus.fr</td>
                <td>PHP</td>
                <td><a href="{{ route('parametresadmin') }}"><button>Modifier</button></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Courcenet</td>
                <td>Sandra</td>
                <td>SCOURCENET</td>
                <td>scourcenet@ccicampus.fr</td>
                <td>Droit</td>
                <td><a href="{{ route('parametresadmin') }}"><button>Modifier</button></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Beteta</td>
                <td>Stéphane</td>
                <td>SBETETA</td>
                <td>sbeteta@ccicampus.fr</td>
                <td>Lémurien</td>
                <td><a href="{{ route('parametresadmin') }}"><button>Modifier</button></a></td>
            </tr>
        </tbody>
    </table>
</section>
@stop