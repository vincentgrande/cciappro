<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta name="author" content="Golder Lucas">
    <link rel="stylesheet" href="./CSS/grid.css">
    <!--<link rel="stylesheet" href="./CSS/style.css">-->
    <link rel="stylesheet" href="./CSS/connexion.css">
    <script src="./js/all.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/connexion.js"></script>
    <script src="./js/jquery.min.js"></script>
    <meta name="description" content="CCIAPPRO">
    @livewireStyles
</head>

<body class="fnd-gris">
    <div class="grid">
        <header class="dp-flex fnd-gris">
            <img class="logo-cci" src="IMG/logo-cci.png" alt="Logo CCI">
        </header>
        <div class="content">
            
            @livewire('login-register')
        </div>
        <footer>
            <p>2020 | CCIAPPRO &#x24D2;</p>
        </footer>
    </div>
    @livewireScripts
</script>
</body>

</html>