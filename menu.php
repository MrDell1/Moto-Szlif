<?php
  session_start();
?>

<div id="main">
  <div id="header">
    <div id="logo">
        <a href="index.php" style="text-decoration: none;"><h1>MOTO-SZLIF <sup>&reg</sup> </h1></a>
    </div>
    <div id="inf">
        <div id="prac">
          <div id="dryn"><span><i class="fa fa-clock-o"></i></span></div>
          <div id="num" class="godz">Pracujemy<br><span>Pon-Pt 8.00-16.00</span></div>
        </div>
      <div id="tel">
        <div id="dryn"><span> <i class="fas fa-phone"></i></span></div>
        <div id="num" class="godz">Wszystkie inforamcje <br> <span>1234567890</span></div>        
      </div>         
    </div>
  </div>

<div id="nav">
  <div id="tab">
  <ul >
         <li id="serch">
             <ul>
                <li><a class="nav-content" href="index.php">Start</a></li>
                <li><a class="nav-content" href="ofirmie.php">O firmie</a></li>
                <li><a class="nav-content" href="oferta.php">Oferta</a></li>
                <li><a class="nav-content" href="uslugi.php">Usługi</a></li>
                <li><a class="nav-content" href="galeria.php">Galeria</a></li>
                <li><a class="nav-content" href="sklep.php">Sklep</a></li>
            </ul>
        </li>
        <li id="menu">
            <span id="open" onclick="otwieracz()"> <i  class="fas fa-bars"></i></span>
            <span id="close" onclick="zamykacz()"> <i  class="fas fa-close"></i></span>
            <div id="menu-content">
              <a href="index.php">Start</a>
              <a href="ofirmie.php">Kategorie</a>
              <a href="oferta.php">Informacje</a>
              <a href="uslugi.php">Producenci</a>
              <a href="galeria.php">Promocje</a>
              <a href="sklep.php">Sklep</a>
              <a href="kontakt.php">Kontakt</a>              
            </div>
        </li>

  </ul>
  </div>
  </div>
</div>