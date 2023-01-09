<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}
$error = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['summary']) && $_GET['summary'] == 'true') {
    if ($_POST['foo'] == 'Wstecz') {
        $_SESSION['step'] = 4;
        header("location: order.php");
        exit();
    }

    if ($_POST['rules'] == 'on') {
        $_SESSION['rulesErr'] = "";
    } else {
        $error = 0;
        $_SESSION['rulesErr'] = "Akceptacja regulaminu jest wymagana";
    }
    if ($_POST['privacy'] == 'on') {

        $_SESSION['privacyErr'] = "";
    } else {
        $error = 0;
        $_SESSION['privacyErr'] = "Akceptacja polityki prywatności jest wymagana";
    }
    if ($error == 1) {
        $eng_num = "";
        if (isset($_SESSION['eng_num'])) {

            $eng_num = "Eng_num = '" . $_SESSION['eng_num'] . "',";
        }
        $company = "";
        if (isset($_SESSION['company'])) {

            $company = "Company = '," . $_SESSION['company'] . "'";
        }
        $nip = "";
        if (isset($_SESSION['nip'])) {

            $nip = "NIP = '," . $_SESSION['nip'] . "'";
        }
        $sql_head = ("INSERT INTO `head_data` SET Mark = '" . $_SESSION['mark'] . "', Model = '" . $_SESSION['model'] . "', Year = '" . $_SESSION['year'] . "', Capacity = '" . $_SESSION['capacity'] . "', Fuel = '" . $_SESSION['fuel'] . "', " . $eng_num . " Valve = '" . $_SESSION['valve'] . "'");

        $sql_customer = ("INSERT INTO `customer` SET Id_Usr='". $_SESSION['id'] ."' Fname ='" . $_SESSION['fname'] . "', Lname = '" . $_SESSION['lname'] . "', Email = '" . $_SESSION['email'] . "', Number = '" . $_SESSION['tel_number'] . "', Country = '" . $_SESSION['country'] . "', State = '" . $_SESSION['state'] . "', City = '" . $_SESSION['city'] . "', Adress = '" . $_SESSION['address'] . "', Code = '" . $_SESSION['code'] . " '" . $company . " " . $nip );

        $sql_customer_checked = ("SELECT * FROM customer WHERE Fname ='" . $_SESSION['fname'] . "'AND Lname = '" . $_SESSION['lname'] . "'AND Email = '" . $_SESSION['email'] . "'AND Number = '" . $_SESSION['tel_number'] . "'AND Country = '" . $_SESSION['country'] . "'AND State = '" . $_SESSION['state'] . "'AND City = '" . $_SESSION['city'] . "'AND Adress = '" . $_SESSION['address'] . "'AND Code = '" . $_SESSION['code'] . "'AND " . $company . " AND " . $nip . " AND Date >= NOW() - INTERVAL 1 DAY");

        $sql_customer_checked_select = $conn->query($sql_customer_checked);


        $conn->query($sql_customer);
        $conn->query($sql_head);

        $sql_head_select = ("SELECT Id_head FROM head_data WHERE Date = CURRENT_TIMESTAMP()");
        $result_head = $conn->query($sql_head_select);
        $result_head_id = $result_head->fetch_assoc();
        $_SESSION['Id_head'] = $result_head_id['Id_head'];

        $sql = "SELECT `Id_part` FROM `parts`";
        $result = $conn->query($sql);
        $part = "'";
        $part2 = '';

        while ($x = $result->fetch_assoc()) {

            $id = $x['Id_part'];

            for ($int1 = 0; $int1 = 0; $int1++) {
                if (isset($_SESSION['parts_' . $id])) {
                    $part2 .= "'" . $_SESSION['parts_' . $id] . "'";
                }
            }

            if (isset($_SESSION['parts_' . $id])) {
                $part2 .= ". '" . $_SESSION['parts_' . $id] . "'";
            }
        }
        $part2 = addslashes($part2);
        $part2 = ltrim($part2, ". ");
        $part2 .= "'";
        $part .= $part2;

        if ($part == "''") {
            $part = "NULL";
        }


        $sql = "SELECT `Id` FROM `services`";
        $result = $conn->query($sql);
        $name = "'";
        $name2 = '';

        while ($x = $result->fetch_assoc()) {

            $id = $x['Id'];

            for ($int1 = 0; $int1 = 0; $int1++) {
                if (isset($_SESSION['services_' . $id])) {
                    $name2 .= "'" . $_SESSION['services_' . $id] . "'";
                }
            }

            if (isset($_SESSION['services_' . $id])) {
                $name2 .= ". '" . $_SESSION['services_' . $id] . "'";
            }
        }
        $name2 = addslashes($name2);
        $name2 = ltrim($name2, ". ");
        $name2 .= "')";
        $name .= $name2;



        $sql_orders = ("INSERT INTO `orders` (`Id_order`, `Id_Usr`, `Id_head`, `Name_parts`, `Name_services`) VALUES (NULL, '" . $_SESSION['id'] . "', '" . $_SESSION['Id_head'] . "', " . $part . ", " . $name);
        $conn->query($sql_orders);

        $_SESSION['step'] = 6;
        header("location: order.php");
    }
}
?>
<div class="flex flex-col align-center items-center">
    <div class='my-2'><span class='rounded-full border-gray-400 border-2 px-2 py-2 font-semibold'>5</span></div>
    <h2>Krok piąty</h2>
    <span>Sprawdź czy wszystko się zgadza w przeciwnym wypadku cofnij się</span>
</div>
<div id="form">
    <div class="flex flex-col gap-10">
        <div class="flex flex-row">
            <div class='flex flex-col gap-4 w-1/4'>
                <h1 class='summary_heading'>Dane auta</h1>
                <div class="summary_data">
                    <span>Marka:</span>
                    <?php echo $_SESSION['mark']; ?>
                </div>
                <div class="summary_data">
                    <span>Model:</span>
                    <?php echo $_SESSION["model"]; ?>
                </div>
                <div class="summary_data">
                    <span>Rok produkcji:</span>
                    <?php echo $_SESSION['year']; ?>
                </div>
                <div class="summary_data">
                    <span>Pojemność:</span>
                    <?php echo $_SESSION['capacity']; ?>
                </div>
                <div class="summary_data">
                    <span>Rodzaj paliwa:</span>
                    <?php echo $_SESSION['fuel']; ?>
                </div>

                <?php if (isset($_SESSION['eng_num'])) {
                    echo "<div class='summary_data'>";
                    echo "<span>Numer silnika:</span>";
                    echo $_SESSION['eng_num'];
                    echo "</div>";
                }; ?>

                <div class="summary_data">
                    <span>Ilość zaworów:</span>
                    <?php echo $_SESSION['valve']; ?>
                </div>
                <div class="summary_data">
                    <span>Typ silnika:</span>
                    <?php if ($_SESSION['type'] == "row_eng") {
                        echo "Silnik rzędowy";
                    } else if ($_SESSION['type'] == "v_eng") {
                        echo "Silnik typu V";
                    } else if ($_SESSION['type'] == "w_eng") {
                        echo "Silnik typu W";
                    } else {
                        echo "Silnik typu boxer";
                    }; ?>
                </div>

            </div>
            <div class='flex flex-col gap-4 w-1/4 items-center'>
                <h1 class='summary_heading'>Części</h1>
                <?php
                $sql = "SELECT * FROM `parts`";
                $result = $conn->query($sql);
                while ($x = $result->fetch_assoc()) {
                    $id = $x['Id_part'];
                    if (isset($_SESSION['parts_' . $id])) {
                        echo "<div class='summary_data'>";
                        echo "<span>" . $_SESSION['parts_' . $id] . "</span>";
                        echo "</div>";
                    };
                }
                ?>
            </div>
            <div class='flex flex-col gap-4 w-1/4 items-center'>
                <h1 class='summary_heading'>Usługi</h1>
                <?php
                $sql = "SELECT * FROM `services` ORDER BY `services`.`Name` ";
                $result = $conn->query($sql);
                while ($x = $result->fetch_assoc()) {
                    $id = $x['Id'];
                    if (isset($_SESSION['services_' . $id])) {
                        echo "<div class='summary_data'>";
                        echo "<span>" . $_SESSION['services_' . $id] . "</span>";
                        echo "</div>";
                    }
                }
                ?>
            </div>


            <div class='flex flex-col gap-4 w-1/4'>
                <h1 class='summary_heading'>Twoje dane</h1>
                <div class="summary_data">
                    <span>Imię:</span>
                    <?php echo $_SESSION['fname']; ?>
                </div>
                <div class="summary_data">
                    <span>Nazwisko:</span>
                    <?php echo $_SESSION['lname']; ?>
                </div>
                <div class="summary_data">
                    <span>Email:</span>
                    <?php echo $_SESSION['email']; ?>
                </div>
                <div class="summary_data">
                    <span>Numer telefonu:</span>
                    <?php echo $_SESSION['tel_number']; ?>
                </div>
                <div class="summary_data">
                    <span>Kraj:</span>
                    <?php echo $_SESSION['country']; ?>
                </div>
                <div class="summary_data">
                    <span>Województwo:</span>
                    <?php echo $_SESSION['state']; ?>
                </div>
                <div class="summary_data">
                    <span>Miasto:</span>
                    <?php echo $_SESSION['city']; ?>
                </div>
                <div class="summary_data">
                    <span>Adres:</span>
                    <?php echo $_SESSION['address']; ?>
                </div>
                <div class="summary_data">
                    <span>Kod pocztowy:</span>
                    <?php echo $_SESSION['code']; ?>
                </div>
                <?php if (isset($_SESSION['company'])) {
                    echo "<h1 class='summary_heading'>Dane do faktury:</h1>";
                    echo "<div class='summary_data'>";
                    echo "<span>Nazwa firmy:</span>";
                    echo $_SESSION['company'];
                    echo "</div>";
                }; ?>
                <?php if (isset($_SESSION['company'])) {
                    echo "<div class='summary_data'>";
                    echo "<span>NIP:</span>";
                    echo $_SESSION['nip'];
                    echo "</div>";
                }; ?>

            </div>
        </div>
        <form class="flex flex-col gap-8 items-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?summary=true" method='POST'>
            <div class="flex flex-col gap-4">
                <div class='flex flex-row justify-between items-center gap-2'>
                    <label class="font-bold py-1" for="rules">Akceptuje <a class="text-[#00046b]" href="regulamin.pdf">Regulamin</a>:</label>
                    <div class="error">
                        <span><?php if (isset($_SESSION['rulesErr'])) {
                                    echo $_SESSION['rulesErr'];
                                } ?></span>
                    </div>
                    <input type="checkbox" name="rules" id="rules">
                </div>
                <div class='flex flex-row justify-between items-center gap-2'>
                    <label class="font-bold py-1" for="privacy">Akceptuje <a class="text-[#00046b]" href="Polityk prywatnosci.pdf">Polityke prywatności</a>:</label>
                    <div class="error">
                        <span><?php if (isset($_SESSION['privacyErr'])) {
                                    echo $_SESSION['privacyErr'];
                                } ?></span>
                    </div>
                    <input type="checkbox" name="privacy" id="privacy">
                </div>
            </div>
            <div class='flex flex-row gap-4 w-full'>
                <input type="submit" class="hover:bg-[#3801ff] bg-[#c70f0f] w-full text-white rounded-md border-color-[#d1d5db] h-10 border-[1px]" value="Wstecz" name="foo" />
                <input class="w-full rounded-md border-color-[#d1d5db] h-10 border-[1px]" type="submit" value="Następny krok" name="foo" />
            </div>
        </form>


    </div>