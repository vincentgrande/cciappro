<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Lucas Golder">
    <link rel="stylesheet" href="./CSS/grid.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/mail.css">
    <meta name="description" content="CCIAPPRO">
    <title>Mail</title>
    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>    
    <![endif]-->
</head>

<body>
    <table class="table-mail">
        <tbody>
            <tr>
                <td class="fnd-gris first-row">
                    <div>
                        <p class="txt-header-mail">Votre commande est en<br>cours de validation</p>
                        <img class="img-mail" src="IMG/logo-cci.png" alt="Logo CCI">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="fnd-blanc second-row">
                    <p>Bonjour {{ $name }} {{ $firstname }},</p><br><br>
                    <p>Votre commande sur CCI APPRO a bien été reçue.
                        Elle est en attente jusqu'à la validation d'un administrateur.</p><br><br>
                    <p>En attendant, voici un rappel de votre commande :</p>
                    <table class="order-table">
                        <tr class="order-tr">
                            <td class="big-size-td">Produit</td>
                            <td class="little-size-td">Quantité</td>
                        </tr>
                        <?php
                        foreach($cart as $article){
                            echo"<tr class='order-tr'>
                                <td class='big-size-td'>$article->article</td>
                                <td class='little-size-td'>$article->quantite</td>
                            </tr>"
                        }
                        
                        ?>
                    </table>
                        
                </td>
            </tr>
            <tr>
                <td class="fnd-gris third-row">
                    <p class="txt-footer-mail">Retrouvez-nous sur <a href="http://cciappro.ppe">cciappro.ppe</a></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>