<!doctype html> 
<html lang="fr"> 
  <head> 
    <meta charset="utf-8"> 
    <meta name="author" content="Grande Vincent">
    <meta name="description" content="CCIAPPRO">
    <link rel="stylesheet" href="./CSS/grid.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="./JS/all.js"></script>
    <script src="./JS/script.js"></script>
    @yield('style-js')
    <title>{{ $title }}</title> 
    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>    
    <![endif]--> 
  </head> 
 
  <body> 
    <div class="grid"> 
      <section class="autogrid nav-bar">
        <div>
            <p class="menuUn"><a href="{{ route('shop') }}" class="dropbtn nav-blue"><i class="fas fa-store"></i>FOURNITURE</a></p>
        </div>
        <div>
            <p class="menuUn"><a href="#" class="dropbtn nav-blue"><i class="fas fa-shopping-cart"></i>PANIER <?php if($panier>0) { echo "<span style='border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;border: 0px solid #000000;background-color:#DC1A4F;color:white;font-size:0.8em;'>+$panier</span>";}?></a></p>
        </div>
        <div>
            <p class="menuDeux"><button onclick="drop()" class="dropbtn nav-pink li-nav"><i class="fas fa-user"></i> {{ $user }}</button></p>
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <p class="menuDrop"><a href="#">Historique des commandes</a></p>
                    <p class="menuDrop"><a href="#">Paramètres</a></p>
                    <p class="menuDrop"><a href="{{ route('logout') }}">Déconnexion</a></p>
                </div>
            </div>
        </div>
    </section>
    <header class="fnd-gris header-gris dp-flex">
        <img class="header-img" src="img/logo-cci.png" alt="Logo CCI">
        <div class="fnd-gris header-fnd-title">
            <h1 class="header-title">{{ $title }}</h1>
        </div>
    </header>
      <div class="content">
      @yield('content')
      </div> 
      <footer><p>2020 | CCIAPPRO &#x24D2;</p></footer> 
    </div> 
  </body> 

</html> 
