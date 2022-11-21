<?php
session_start();
echo $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <?php
  include('head.php');
  ?>

</head>

<body onload="Slider();">
  <?php
  include('menu.php');
  ?>
  <main class="flex flex-col">
    <div class="hidden md:block">
      <?php
      include('slider.php');
      ?>
      <hr class="border-b-4 border-[#00046b]" />
    </div>
    <div class="flex flex-col 2xl:flex-row gap-10 md:gap-3 px-4 sm:px-10 lg:px-40 my-20 justify-between">
      <div class="flex flex-col gap-3 items-center 2xl:items-start">
        <div class="flex h-[43px]">
          <div class="border-l-2 border-red-600"></div>
          <h1 class="px-6 text-4xl font-bold">Dlaczego my?</h1>
        </div>
        <div class="px-6">
          <p class="font-medium text-clip xl:text-left w-60 sm:w-72 md:w-96">
            MOTO-SZLIF to wyspecjalizowany zespół z wieloletnim doświadczeniem w
            naprawie i regeneracji głowic silnikowych oraz silników. Nasz zakład
            wyposażony jest w wysoce zaawansowany park maszynowy. Oferujemy
            komory nad wymiarowe, zregenerowane lub nowe głowice oraz inne
            części silnikowe.
          </p>
        </div>
      </div>
      <div class="flex flex-col 2xl:flex-row gap-8">
        <a href="/o-nas.php">
          <div class="flex items-center flex-col gap-4 px-4 py-4 text-center ease-linear rounded-md duration-75 hover:bg-[#00046b] hover:text-white">
            <span class="material-symbols-outlined h-12 w-full text-5xl">
              work_history
            </span>
            <div class="max-w-[14rem]">
              <h1 class="text-2xl py-2 font-semibold">Ponad 65 lat!</h1>
              <p class="text-lg">Jesteśmy firmą rodzinną, która istnieje od 1946 roku.</p>
            </div>
          </div>
        </a>
        <a href="/oferta.php">
          <div class="flex items-center flex-col gap-4 px-4 py-4 text-center ease-linear rounded-md duration-75 hover:bg-[#00046b] hover:text-white">
            <span class="material-symbols-outlined h-12 w-full text-5xl">
              assignment_turned_in
            </span>
            <div class="max-w-[14rem]">
              <h1 class="text-2xl py-2 font-semibold">Bogata oferta</h1>
              <p class="text-lg">Specjalizujemy się w naprawie głowic oraz silników do samochodów osobowych, ciężarowych oraz maszyn rolniczych i budowlanych.</p>
            </div>
          </div>
        </a>
        <a href="/o-nas.php">
          <div class="flex items-center flex-col gap-4 px-4 py-4 text-center ease-linear rounded-md duration-75 hover:bg-[#00046b] hover:text-white">
            <span class="material-symbols-outlined h-12 w-full text-5xl">
              menu_book
            </span>
            <div class="max-w-[14rem]">
              <h1 class="text-2xl py-2 font-semibold">Doświadczona kadra</h1>
              <p class="text-lg">Fachowa wiedza i doświadczenie naszych pracowników stanowi gwarancję wysokiej jakości naszych usług.</p>
            </div>
          </div>
        </a>
        <a href="/oferta.php">
          <div class="flex items-center flex-col gap-4 px-4 py-4 text-center ease-linear rounded-md duration-75 hover:bg-[#00046b] hover:text-white">
            <span class="material-symbols-outlined h-12 w-full text-5xl">
              work_history
            </span>
            <div class="max-w-[14rem]">
              <h1 class="text-2xl py-2 font-semibold">Ponad 65 lat!</h1>
              <p class="text-lg">Jesteśmy firmą rodzinną, która istnieje od 1946 roku.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="flex flex-col gap-10 lg:gap-0 px-4 sm:px-10 lg:px-40 my-20">
      <div class="flex h-[43px]">
        <div class="border-l-2 border-red-600"></div>
        <h2 class="px-6 text-4xl font-bold">Najpopularniejsze usługi</h2>
      </div>
      <div class="flex font-semibold text-xl gap-20 justify-center py-8 items-center flex-wrap">
        <div class="flex flex-col w-56 items-center gap-3 justify-center h-full" id={id}>
          <div class="overflow-hidden rounded-2xl h-[70%] transition-all duration-[0.5s] delay-[0s] hover:shadow-[11px_9px_4px_rgba(28,41,81,0.25)]">
            <img alt="Obróbka gniazd zaworowych" class="max-h-40 h-40 w-full object-cover transition-all duration-[0.5s] delay-[0s] overflow-hidden hover:scale-150" src="Graphic/Gniazda.webp" />
          </div>
          <p class="h-14 text-center">Obróbka gniazd zaworowych</p>
        </div>
        <div class="flex flex-col w-56 items-center gap-3 justify-center h-full" id={id}>
          <div class="overflow-hidden rounded-2xl h-[70%] transition-all duration-[0.5s] delay-[0s] hover:shadow-[11px_9px_4px_rgba(28,41,81,0.25)]">
            <img alt="planownaie głowicy lub bloku" class="max-h-40 h-40 w-full object-cover transition-all duration-[0.5s] delay-[0s] overflow-hidden hover:scale-150" src="Graphic/planowanie.webp" />
          </div>
          <p class="h-14 text-center">Planowanie</p>
        </div>
        <div class="flex flex-col w-56 items-center gap-3 justify-center h-full" id={id}>
          <div class="overflow-hidden rounded-2xl h-[70%] transition-all duration-[0.5s] delay-[0s] hover:shadow-[11px_9px_4px_rgba(28,41,81,0.25)]">
            <img alt="spawanie głowicy" class="max-h-40 h-40 w-full object-cover transition-all duration-[0.5s] delay-[0s] overflow-hidden hover:scale-150" src="Graphic/Spawanie.webp" />
          </div>
          <p class="h-14 text-center">Spawanie</p>
        </div>
        <div class="flex flex-col w-56 items-center gap-3 justify-center h-full" id={id}>
          <div class="overflow-hidden rounded-2xl h-[70%] transition-all duration-[0.5s] delay-[0s] hover:shadow-[11px_9px_4px_rgba(28,41,81,0.25)]">
            <img alt="sprawdzane szczelności" class="max-h-40 h-40 w-full object-cover transition-all duration-[0.5s] delay-[0s] overflow-hidden hover:scale-150" src="Graphic/Szczelnosc.webp" />
          </div>
          <p class="h-14 text-center">Sprawdzanie szczelności</p>
        </div>
      </div>
    </div>
  </main>



  <?php
  include('footer.php');
  ?>
</body>
<script>
  function openModal() {
    document.getElementById('Modal').style.display = "block";
  }

  function closeModal() {
    document.getElementById('Modal').style.display = "none";
  }

  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slide");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function otwieracz() {
    document.getElementById("open").style.display = 'none';
    document.getElementById("close").style.display = 'block';
    document.getElementById("menu-content").style.display = 'block';
    document.getElementById("menu-content").style.opacity = '21';
    document.getElementById("menu-content").style.animation = 'fade 0.5s';
    document.getElementById("close").style.animation = 'fade 0.5s';


  }

  function zamykacz() {
    document.getElementById("open").style.display = 'block';
    document.getElementById("close").style.display = 'none';
    document.getElementById("menu-content").style.animation.name = 'fade'
    document.getElementById("menu-content").style.animation.duration = '0.5s'
    document.getElementById("menu-content").style.animation.direction = 'reverse'
    document.getElementById("menu-content").style.opacity = '0';
    document.getElementById("open").style.animation = 'fade 0.5s ';

  }
</script>
<script>
  var numer = Math.floor(Math.random() * 4) + 1;
  var timer1 = 0;
  var timer2 = 0;
  var zdania = new Array(4)
  var x = 0;
  var zd = 0; {
    zdania[1] = "<div id=\"zdanie\" class=\"zdanie\">DLACZEGO MOTO-SZLIF?</div>";
    zdania[2] = "<div id=\"zdanie\" class=\"zdanie\">WIELOLETNIA TRADYCJA</div>";
    zdania[3] = "<div id=\"zdanie\" class=\"zdanie\">PASJA I MIŁOŚĆ DO MOTORYZACJI</div>";
    zdania[4] = "<div id=\"zdanie\" class=\"zdanie\">NOWECZESNE TECHNOLOGIE</div>";
  }

  function slide(nrslajdu) {
    clearTimeout(timer1);
    clearTimeout(timer2);
    numer = nrslajdu - 1;
    schowaj();

    setTimeout("Slider()", 500);
  }

  function schowaj() {
    $("#myslider").fadeOut(500);
    $("#zdanie").fadeOut(500);
  }


  function Slider() {
    numer++;


    if (numer > 4) {
      numer = 1;
    }
    x = numer;
    zdania[x];
    var plik = document.getElementById("myslider").style.backgroundImage = "url(\"graphic/photo" + numer + ".jpeg\")"


    document.getElementById("zdanie").innerHTML = zdania[x];
    $("#zdanie").fadeIn(500);
    $("#myslider").fadeIn(500);

    timer1 = setTimeout("Slider()", 5000);
    timer2 = setTimeout("schowaj()", 4500);
  }
</script>
<style>
  .material-symbols-outlined {
    font-variation-settings: "FILL"0, "wght"400, "GRAD"0, "opsz"48;
  }
</style>

</html>