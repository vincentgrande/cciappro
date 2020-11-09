@extends('template')

@section('style-js')
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
                <td class="td-margin half-table">Produit</td>
                <td class="td-margin quart-table">Date de commande</td>
                <td class="quart-table">Statut</td>
                <td class="min-table"></td>
            </tr>

            <tr class="tr-commande">
                <td class="td-margin half-table">Fluo 2x, cahier 4x, ciseaux 1x,<br>colle 6x</td>
                <td class="td-margin quart-table">03/09/2020</td>
                <td class="quart-table livre">Livré</td>
                <td class="min-table"><i onclick="showInfoOne();" class="fas fa-angle-down"></i></td>
            </tr>
            <tr class="tr-info dp-none" id="order-one">
                <td class="">
                    <p><img class="info-img" src="img/fluo.png" alt=""></p>
                    <p><img class="info-img" src="img/cahier.png" alt=""></p>
                    <p><img class="info-img" src="img/ciseaux.png" alt=""></p>
                    <p><img class="info-img" src="img/colle.png" alt=""></p>
                </td>
                <td class="quart-table td-noauto">
                    <p class="info-txt ">2x Fluo</p>
                    <p class="info-txt ">4x Cahier</p>
                    <p class="info-txt ">1x Ciseaux</p>
                    <p class="info-txt ">6x Colle</p>
                </td>
                <td class="min-table td-noauto">
                    <p class="livre info-txt">Livré</p>
                    <p class="livre info-txt">Livré</p>
                    <p class="livre info-txt">Livré</p>
                    <p class="livre info-txt">Livré</p>
                </td>
                <td class="min-table"></td>
            </tr>

            <tr class="tr-commande">
                <td class="td-margin half-table">Fluo 2x, cahier 4x, ciseaux 1x,<br>colle 6x</td>
                <td class="td-margin quart-table">03/09/2020</td>
                <td class="quart-table en-cours">En cours de livraison</td>
                <td class="min-table"><i onclick="showInfoTwo();" class="fas fa-angle-down"></i></td>
            </tr>
            <tr class="tr-info dp-none" id="order-two">
                <td class="">
                    <p><img class="info-img" src="IMG/fluo.png" alt=""></p>
                    <p><img class="info-img" src="IMG/cahier.png" alt=""></p>
                    <p><img class="info-img" src="IMG/ciseaux.png" alt=""></p>
                    <p><img class="info-img" src="IMG/colle.png" alt=""></p>
                </td>
                <td class="quart-table td-noauto">
                    <p class="info-txt ">2x Fluo</p>
                    <p class="info-txt ">4x Cahier</p>
                    <p class="info-txt ">1x Ciseaux</p>
                    <p class="info-txt ">6x Colle</p>
                </td>
                <td class="min-table td-noauto">
                    <p class="livre info-txt">Livré</p>
                    <p class="en-cours info-txt">En cours de<br>livraison</p>
                    <p class="livre info-txt">Livré</p>
                    <p class="en-cours info-txt">En cours de<br>livraison</p>
                </td>
                <td class="min-table"></td>
            </tr>

            <tr class="tr-commande">
                <td class="td-margin half-table">Fluo 2x, cahier 4x, ciseaux 1x,<br>colle 6x</td>
                <td class="td-margin quart-table">03/09/2020</td>
                <td class="quart-table refuse">Refusé</td>
                <td class="min-table"><i onclick="showInfoThree();" class="fas fa-angle-down"></i></td>
            </tr>
            <tr class="tr-info dp-none" id="order-three">
                <td class="">
                    <p><img class="info-img" src="IMG/fluo.png" alt=""></p>
                    <p><img class="info-img" src="IMG/cahier.png" alt=""></p>
                    <p><img class="info-img" src="IMG/ciseaux.png" alt=""></p>
                    <p><img class="info-img" src="IMG/colle.png" alt=""></p>
                </td>
                <td class="quart-table td-noauto">
                    <p class="info-txt ">2x Fluo</p>
                    <p class="info-txt ">4x Cahier</p>
                    <p class="info-txt ">1x Ciseaux</p>
                    <p class="info-txt ">6x Colle</p>
                </td>
                <td class="min-table td-noauto">
                    <p class="refuse info-txt">Refusé</p>
                    <p class="refuse info-txt">Refusé</p>
                    <p class="refuse info-txt">Refusé</p>
                    <p class="refuse info-txt">Refusé</p>
                </td>
                <td class="min-table"></td>
            </tr>
        </tbody>
    </table>
</section>

@stop