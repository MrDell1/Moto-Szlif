<?php
function bestOfert($id, $photo, $text, $altText)
{
    echo    '<div class="flex flex-col w-56 items-center gap-3 justify-center h-full" id=' . $id . '>
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
        <div class="fkex flex-col flex-nowrap">
            <div class="flex px-4 sm:px-10 lg:px-40 my-10 flex-col gap-10">
                <div class="flex h-[43px] justify-center">
                    <div class="border-l-2 border-red-600"></div>
                    <h4 class="px-6 text-4xl font-bold">Nasze usługi</h4>
                </div>
                <div class="flex gap-20 justify-center">
                    <div class="px-6">
                        <p class="font-medium text-center w-60 sm:w-72 md:w-96">
                            Oferujemy usługi związane z naprawa i regeneracja głowic jak i
                            silników. Staramy się by nasze usługi były najwyższej jakości, a
                            także niezawodne i szybkie. Naszym celem jest zapewnienie
                            najwyższej jakości usług, przy zachowaniu atrakcyjnych cen.
                            Naprawy silników i głowic dostosowujemy do indywidualnych potrzeb
                            klienta, oferując wszystkie możliwe usługi w zakresie regeneracji
                        </p>
                    </div>
                </div>
                <div class="flex gap-20 justify-center"> <a class="px-4 py-4 rounded-md bg-[#00046b] hover:bg-blue-900 text-white" href="order.php">Zamów naprawę online</a></div>
                <div class="flex font-semibold text-xl gap-20 justify-center py-8 flex-wrap items-center">
                    <?php bestOfert($id = "gniazda", $photo = "assets/Gniazda.webp", $text = "Obróbka gniazd zaworowych", $altText = "obróbka gniazd zaworowych") ?>
                    <?php bestOfert($id = "planowanie", $photo = "assets/planowanie.webp", $text = "Planowanie", $altText = "planowanie głowicy, planowanie bloku") ?>
                    <?php bestOfert($id = "spawanie", $photo = "assets/Spawanie.webp", $text = "Spawanie", $altText = "spawanie głowicy") ?>
                    <?php bestOfert($id = "szczelnosc", $photo = "assets/Szczelnosc.webp", $text = "Sprawdzanie szczelności", $altText = "sprawdzanie szczelności") ?>
                    <?php bestOfert($id = "honowanie", $photo = "assets/honowanie.webp", $text = "Honowanie", $altText = "honowanie bloku") ?>
                    <?php bestOfert($id = "zawor", $photo = "assets/zawor.webp", $text = "Szlifowanie zaworów", $altText = "szlif zaworów") ?>
                    <?php bestOfert($id = "wal", $photo = "assets/wal.webp", $text = "Szlif wału korbowego", $altText = "szlif wału korbowego") ?>
                    <?php bestOfert($id = "komory", $photo = "assets/komory.webp", $text = "Wymiana komór wirowych", $altText = "wymiana komór wirowych") ?>
                    <?php bestOfert($id = "silnik", $photo = "assets/silnik.webp", $text = "Regeneracja silników", $altText = "regeneracja silnika") ?>
                    <?php bestOfert($id = "glowica", $photo = "assets/glowicaZawor.webp", $text = "Regeneracja głowic", $altText = "regeneracja bloku") ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    include('footer.php');
    ?>
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