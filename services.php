<div class="flex flex-col align-center items-center">
    <div class='my-2'><span class='rounded-full border-gray-400 border-2 px-2 py-2 font-semibold'>3</span></div>
    <h2>Krok trzeci </h2>
    <span class="text-center">Zaznacz z których usług chcesz skorzystać, <br>niektóre usługi wiążą się z kosztami nowych część nie wliczonych w
        cene usługi np. Wymiana zaworów. <br> Podane ceny są poglądowe i są cenami netto, pełny kosztorys zostnie przesłany po otrzymaniu przez nas głowicy</span>
</div>
<div class="p-8 h-[800px] w-full">
    <div id="data w-full h-full">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'm-s');
        if (mysqli_connect_errno()) {
            echo "Błąd połączenia nr: " . mysqli_connect_errno();
            echo "Opis błędu: " . mysqli_connect_error();
            exit();
        }

        $sql = "SELECT * FROM `services`";
        $result = $conn->query($sql);
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['services']) && $_GET['services'] == 'true') {
            if ($_POST['foo'] == 'Wstecz') {
                $_SESSION['step'] = 2;
                header("location: order.php");
                exit();
            }
            $sql = "SELECT * FROM `services`";
            $result = $conn->query($sql);
            while ($x = $result->fetch_assoc()) {
                $id = $x['Id'];
                if (isset($_POST[$id])) {
                    if ($_POST[$id] == 'on') {

                        $_SESSION['services_' . $id] = $x['Name'];
                    }
                } else {
                    unset($_SESSION['services_' . $id]);
                }
            }

            $_SESSION['step'] = 4;
            header("location: order.php");
        }
        ?>


        <form class="flex h-full w-full" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?services=true" method='POST'>
            <div class="flex flex-col gap-8 w-full">
                <div class="flex flex-col gap-4 flex-wrap max-h-[700px] content-center">

                    <?php

                    $sql = "SELECT * FROM `services` ORDER BY `services`.`Name` ASC";


                    $result = $conn->query($sql);

                    while ($x = $result->fetch_assoc()) {

                        echo "<div class='services_text'>";

                        echo "<div onclick='myFunction(" . $x['Id'] . ")' class='popup' id=" . $x['Id'] . "_popup >" . $x['Description'] . "</div>";
                        echo "<i class='fa fa-info-circle' onclick='myFunction(" . $x['Id'] . ")'></i>";

                        echo "<label for=" . $x['Id'] . ">" . $x['Name'] . ": <br> Od " . $x['Price_8'] . " do " . $x['Price_16'] . " zł  </label>";
                        echo "<input type='checkbox' name=" . $x['Id'] . " id=" . $x['Id'] . "";
                        if ($x['Name'] == 'Czyszczenie' || $x['Name'] == 'Demontaż' || $x['Name'] == 'Montaż' || isset($_SESSION['services_' . $x['Id']])) {
                            echo " checked";
                        };
                        echo ">";
                        echo "</div>";
                    }


                    ?>
                </div>
                <div class='flex flex-row gap-4 w-full'>
                    <input type="submit" class="hover:bg-[#3801ff] bg-[#c70f0f] w-full text-white rounded-md border-color-[#d1d5db] h-10 border-[1px]" value="Wstecz" name="foo" />
                    <input class="w-full rounded-md border-color-[#d1d5db] h-10 border-[1px]" type="submit" value="Następny krok" name="foo" />
                </div>
            </div>
        </form>
    </div>
</div>