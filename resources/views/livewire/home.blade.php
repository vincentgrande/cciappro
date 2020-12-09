<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta name="author" content="Golder Lucas">
    <link rel="stylesheet" href="./CSS/connexion.css">
    <meta name="description" content="CCIAPPRO">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="./JS/jquery.min.js"></script>

    @livewireStyles
</head>

<body class="fnd-gris">
    <div class="grid">
        <header class="dp-flex fnd-gris">
            <img class="logo-cci" src="img/logo-cci.png" alt="Logo CCI">
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