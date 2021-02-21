<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MOTO-SZLIF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="src/api/git.d.ts">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="new1.css" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
<?php
  include('menu.php');
?>

    <div id="container">

        <div class="comozesz">

            <div id="search">
                <form action="post">
                    <span>Marka auta: </span>
                    <select name="car" id="car">
                        <option value=''>Wszystkie...</options>
                        <option value='abarth'>Abarth</option>
                        <option value='alfa-romeo'>Alfa Romeo</option>
                        <option value='audi'>Audi</option>
                        <option value='bmw'>BMW</option>
                        <option value='citroen'>Citroen</option>
                        <option value='dacia'>Dacia</option>
                        <option value='fiat'>Fiat</option>
                        <option value='ford'>Ford</option>
                        <option value='honda'>Honda</option>
                        <option value='hyundai'>Hyundai</option>
                        <option value='isuzu'>Isuzu</option>
                        <option value='jaguar'>Jaguar</option>
                        <option value='jeep'>Jeep</option>
                        <option value='kia'>Kia</option>
                        <option value='land-rover'>Land Rover</option>
                        <option value='lexus'>Lexus</option>
                        <option value='lotus'>Lotus</option>
                        <option value='maserati'>Maserati</option>
                        <option value='mazda'>Mazda</option>
                        <option value='mercedes-benz'>Mercedes-Benz</option>
                        <option value='mg-motor-uk'>Mg Motor Uk</option>
                        <option value='mini'>Mini</option>
                        <option value='mitsubishi'>Mitsubishi</option>
                        <option value='nissan'>Nissan</option>
                        <option value='peugeot'>Peugeot</option>
                        <option value='polestar'>Polestar</option>
                        <option value='porsche'>Porsche</option>
                        <option value='renault'>Renault</option>
                        <option value='seat'>Seat</option>
                        <option value='skoda'>Skoda</option>
                        <option value='subaru'>Subaru</option>
                        <option value='suzuki'>Suzuki</option>
                        <option value='toyota'>Toyota</option>
                        <option value='vauxhall'>Vauxhall</option>
                        <option value='volkswagen'>Volkswagen</option>
                        <option value='volvo'>Volvo</option>
                    </select>
                    <input  name='code' type="search" id="code" placeholder="Szukaj po kodzie silnika" aria-label="Szukaj"
                        alt="Szukaj">
                    <button id="submite"> <i class="fa fa-search"></i> </button>
                </form>

            </div>

        </div>
        <div id="mozesz">
            <span>Popularne</span>
            <div class="srow">
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
            </div>
            <div class="srow">
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
            </div>
            <div class="srow">
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
                <a href="">
                    <div class="bloczek">
                        <div class="zdj"><img src="photo1.jpeg"></div>
                        <div class="cena">Nazwa Usługi<br>412</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    </div>
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
        var slides = document.getElementsByClassName("Slide");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
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
    }

    function zamykacz() {
        document.getElementById("open").style.display = 'block';
        document.getElementById("close").style.display = 'none';
        document.getElementById("menu-content").style.display = 'none';
    }

</script>

</html>