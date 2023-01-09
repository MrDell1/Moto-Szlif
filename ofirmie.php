<?php
function certyficate( $altText, $photo){
echo '<div class="flex flex-col w-56 items-center gap-3 justify-center h-full">
    <div class="overflow-hidden rounded-2xl h-[70%] transition-all duration-[0.5s] delay-[0s] hover:shadow-[11px_9px_4px_rgba(28,41,81,0.25)]">
        <img alt='.$altText.' class="h-full object-cover scale-105 transition-all duration-[0.5s] delay-[0s] overflow-hidden hover:scale-[1.15]" src='.$photo.' />
    </div>
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
        <Hero />
        <div class="flex flex-col">
            <div class="px-4 sm:px-10 lg:px-40 flex items-center xl:items-[unset] my-20 flex-col gap-10">
                <div class="flex h-[43px]">
                    <div class="border-l-2 border-red-600"></div>
                    <h4 class="px-6 text-4xl font-bold">O nas</h4>
                </div>
                <div class="gap-20 flex justify-between items-center flex-col xl:flex-row">
                    <div class="px-6">
                        <p class="font-medium text-center xl:text-left w-60 sm:w-72 md:w-96">
                            Nasza firma opiera się na doświadczeniu wieloletnich pasjonatów,
                            którzy poprzez lata praktyki opanowali do perfekcji sztukę naprawy
                            głowic i silników. To właśnie takie podejście zainspirowało
                            Andrzeja Urbanka, gdy w <span class="text-[#d01616]">1946</span> roku
                            zakładał firmę MOTO-SZLIF. Jego syn Marian Urbanek kontynuował tę tradycję
                            i przekazał ją obecnemu właścicielowi Krzysztofowi Leszczyńskiemu.
                            Dzięki temu myśl o naprawie głowic i silników jest dla nas czymś naturalnym,
                            co podkreśla fakt, że od początku istnienia firmy wykonujemy te usługi
                            na najwyższym poziomie.
                        </p>
                    </div>
                    <div class="flex gap-20 flex-col md:flex-row">
                        <img alt="andrzej urbanek" src="assets/Andrzej-Urbanek.webp" />
                        <img alt="marian urbanek" src="assets/zlecenie.webp" />
                    </div>
                </div>
                <div class="h-[43px] mt-8 flex justify-center" id="certyfikaty">
                    <h1 class="px-6 text-4xl font-bold">Nasze certyfikaty</h1>
                </div>
                <div class="gap-20 flex flex-wrap items-center justify-center">
                <?php certyficate($altText="certyfikat krajowej izby gospodarczej", $photo="assets/CP.webp") ?>
                <?php certyficate($altText="dyplom uznania", $photo="assets/dyplom.webp") ?>
                <?php certyficate($altText="certyfikat krajowej izby gospodarczej za atrakcyjną wystawę", $photo="assets/KIG.webp") ?>
                <?php certyficate($altText="certyfikat marszałka województwa łódzkiego", $photo="assets/marwojlodz.webp") ?>
                <?php certyficate($altText="certyfikat fair play", $photo="assets/przedfairplay.webp") ?>
                <?php certyficate($altText="certyfikat sia", $photo="assets/SIA-2004.webp") ?>
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
        var slides = document.getElementsByClassName("Slide");
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
    }

    function zamykacz() {
        document.getElementById("open").style.display = 'block';
        document.getElementById("close").style.display = 'none';
        document.getElementById("menu-content").style.display = 'none';
    }
</script>

</html>