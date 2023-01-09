<?php
function bestOfert($photo, $text, $altText)
{
  echo    '<div class="flex flex-col w-56 items-center gap-3 justify-center h-full">
          <div class="overflow-hidden rounded-2xl h-[70%] transition-all duration-[0.5s] delay-[0s] hover:shadow-[11px_9px_4px_rgba(28,41,81,0.25)]">
            <img alt=' . $altText . ' class="max-h-40 h-40 w-full object-cover transition-all duration-[0.5s] delay-[0s] overflow-hidden hover:scale-150" src=' . $photo . ' />
          </div>
          <p class="h-14 text-center">' . $text . '</p>
        </div>';
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <?php
  include('head.php');
  ?>

</head>

<body>
  <?php
  include('menu.php');
  ?>
  <main>
    <div class="flex flex-col flex-nowrap">
      <div class="flex px-4 sm:10 lg:40 my-10 flex-col gap-10">
        <div class="flex h-[43px] justify-center">
          <div class="border-l-2 border-red-600"></div>
          <h4 class="px-6 text-4xl font-bold">Nasza oferta</h4>
        </div>
        <div class="flex gap-20 justify-center">
          <div class="px-6">
            <p class="font-medium text-center w-60 sm:w-72 md:w-96">
              Oferujemy wysokiej jakości zamienniki wałków rozrządu, dźwigienek
              zaworów, popychaczy, głowic oraz nadwymiarowe komory wirowe.
              Wszczystkie wałki rozrządu są produkowane tak, aby odpowiadały
              jakością lub funkcjonalnością równoważną z wałkami rozrządu OEM.
              Nasze komory wirowe produkujemy nieustająco od 2000 roku.
              Posiadamy ponad 100 wzorów które pasują do ponad 250 modeli
              głowic.
            </p>
          </div>
        </div>
        <div class="flex font-semibold text-xl gap-20 justify-center py-8 flex-wrap items-center">
          <a href={komory}>
            <?php bestOfert($photo = "assets/komoryWirowe.webp", $text = "Komory wirowe", $altText = "nadwymiarowe komory wirowe") ?>
          </a>
          <a href="https://ldautomotive.pl/15-walki-rozrzadu">
            <?php bestOfert($photo = "assets/walek.webp", $text = "Wałki rozrządu", $altText = "nowe wałki rozrządu") ?>
          </a>
          <a href="https://ldautomotive.pl/19-powiazane-produkty">
            <?php bestOfert($photo = "assets/dzwigienki.webp", $text = "Dźwigienki zaworów", $altText = "dźwigienki zaworów") ?>
          </a>
          <a href="https://ldautomotive.pl/21-popychacze">
            <?php bestOfert($photo = "assets/popychacz.webp", $text = "Popychacze", $altText = "popychacze") ?>
          </a>
          <a href="https://ldautomotive.pl/23-kola-pasowe">
            <?php bestOfert($photo = "assets/koloPasowe.webp", $text = "Koła Pasowe", $altText = "koła pasowe") ?>
          </a>
          <a href="https://ldautomotive.pl/22-glowice-cylindrow">
            <?php bestOfert($photo = "assets/glowica.webp", $text = "Głowice", $altText = "nowe głowice") ?>
          </a>
        </div>
      </div>
    </div>
  </main>
  <?php
  include('footer.php');
  ?>
  <div id="Modal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div id="modal-content">
      <div class="slide">
        <div class="numbertext">1 / 6</div>
        <img src="http://www.moto-szlif.pl/images/marwojlodz.png">
      </div>
      <div class="slide">
        <div class="numbertext">2 / 6</div>
        <img src="http://www.moto-szlif.pl/images/przedfairplay.png">
      </div>
      <div class="slide">
        <div class="numbertext">3 / 6</div>
        <img src="http://www.moto-szlif.pl/images/CP.jpg">
      </div>
      <div class="slide">
        <div class="numbertext">4 / 6</div>
        <img src="http://www.moto-szlif.pl/images/KIG.jpg">
      </div>
      <div class="slide">
        <div class="numbertext">5 / 6</div>
        <img src="http://www.moto-szlif.pl/images/dyplom.jpg">
      </div>
      <div class="slide">
        <div class="numbertext">6 / 6</div>
        <img src="http://www.moto-szlif.pl/images/SIA-2004.jpg">
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <div class="caption-container">
        <p id="caption"></p>
      </div>
      <div>
        <div class="column">
          <img class="demo cursor" src="http://www.moto-szlif.pl/images/marwojlodz.png" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
        </div>
        <div class="column">
          <img class="demo cursor" src="http://www.moto-szlif.pl/images/CP.jpg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
        </div>
        <div class="column">
          <img class="demo cursor" src="http://www.moto-szlif.pl/images/przedfairplay.png" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
        </div>
        <div class="column">
          <img class="demo cursor" src="http://www.moto-szlif.pl/images/KIG.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
        <div class="column">
          <img class="demo cursor" src="http://www.moto-szlif.pl/images/dyplom.jpg" style="width:100%" onclick="currentSlide(5)" alt="Northern Lights">
        </div>
        <div class="column">
          <img class="demo cursor" src="http://www.moto-szlif.pl/images/SIA-2004.jpg" style="width:100%" onclick="currentSlide(6)" alt="Northern Lights">
        </div>
      </div>

    </div>
  </div>
  </div>
</body>
<script>
  function otwieracz() {
    document.getElementById("open").style.display = 'none';
    document.getElementById("close").style.display = 'block';
    document.getElementById("menu-content").style.display = 'block';
  }

  function zamykacz() {
    document.getElementById("open").style.display = 'block';
    document.getElementById("close").style.display = 'none';
    document.getElementById("menu-content").style.display = 'none';
  }
</script>

</html>