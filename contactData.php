<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$tel_number = $country = $state = $city = $address = $code = "";
$tel_numberErr = $countryErr = $stateErr = $cityErr = $addressErr = $codeErr = "";
$error = 0;

$sql = "SELECT * FROM `customer` WHERE Id_Usr = $_SESSION[id]";
$result = $conn->query($sql);
$x = $result->fetch_assoc();
$tel_number = $x['Number'];
$country = $x['Country'];
$state = $x['State'];
$city = $x['City'];
$address = $x['Adress'];
$code = $x['Code'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["tel_number"])) {
        $tel_numberErr = "Numer telefonu jest wymagany";
        $error = 1;
    } else {
        $tel_number = test_input($_POST["tel_number"]);
        if (!preg_match("/^[0-9]*$/", $tel_number)) {
            $tel_numberErr = "Dozwolone są tylko liczby";
            $error = 1;
        } else {
            $tel_numberErr = "";
        }
    }

    if (empty($_POST["country"])) {
        $countryErr = "Kraj jest wymagany";
        $error = 1;
    } else {
        $country = $_POST["country"];
        $countryErr = "";
    }

    if (empty($_POST["state"])) {
        $stateErr = "Województwo jest wymagane";
        $error = 1;
    } else {
        $state = $_POST["state"];
        $stateErr = "";
    }

    if (empty($_POST["city"])) {
        $cityErr = "Miasto jest wymagane";
        $error = 1;
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $city)) {
            $cityErr = "Dozwolone są tylko litery";
            $error = 1;
        } else {
            $city = $city;
            $cityErr = "";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Adres jest wymagany";
        $error = 1;

    } else {
        $address = test_input($_POST["address"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9]*$/u", $address)) {
            $addressErr = "Dozwolone są tylko litery i liczby";
            $error = 1;

        } else {
            $address = $address;
            
            $addressErr = "";
        }
    }

    if (empty($_POST["code"])) {
        $codeErr = "Kod pocztowy jest wymagany";
        $error = 1;

    } else {
        $code = test_input($_POST["code"]);
        if (!preg_match("/^[0-9-{1}]*$/", $code)) {
            $codeErr = "Dozwolone są tylko liczby";
            $error = 1;

        } else {
            $code = $code;
           
            $codeErr = "";
        }
    }
    if($error == 0){
        $sql = "UPDATE `customer` SET `Number`='".$tel_number."', `Country`='".$country."' , `State`='".$state."', `City`='".$city."', `Adress`='".$address."', `Code`='".$code."' WHERE Id_Usr = $_SESSION[id]";
        $conn ->query($sql);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function input_container($err, $label, $session_name, $id)
{
    echo "<div class='flex flex-col'>";
    echo    "<label class='w-80' for='".$id."'>" . $label . "</label>";
    echo    "<span class='error'>";
    if (isset($err)) {
        echo $err;
    }
    echo    "</span>";
    echo    " <input type='text' class='px-2 py-2 w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]' name='".$id."' id='".$id."' ";
    if (!empty($session_name)) {
        echo "value='" . $session_name . "'";
    }
    echo    " > </div>";
}

function select_container($err, $label, $session_name, $id)
{
    echo "<div class='flex flex-col'>";
    echo    "<label class='w-80' for='".$id."'>" . $label . "</label>";
    echo    "<span class='error'>";
    if (isset($err)) {
        echo $err;
    }
    echo    "</span>";
    echo    " <select class='px-2 py-2 w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]' name='".$id."' id='".$id."' ";
    if (!empty($session_name)) {
        echo "value='" . $session_name . "'";
    }
    echo    ">";
    if($label == "Kraj:"){
        include('countrySelect.php');
    }
    else {
        include('provinceSelect.php');
    }
    echo "  </select></div>";
}


?>


<div class="flex h-full w-full ">
    <div class="h-full flex w-full flex-col gap-10 flex flex-col gap-6 items-center bg-gray-200 border border-gray-300 px-8 py-8 rounded-xl">
        <h1 class="text-3xl font-bold w-full">Twoje dane do wysyłki</h1>
        <div class="flex w-full h-[80%]">
            <form class="flex flex-col items-center gap-8 flex-wrap h-full" method="post" action="<?php echo htmlspecialchars("profile.php?step=2");?>">
                <?php input_container($tel_numberErr, "Numer telefonu:", $tel_number, "tel_number") ?>
                <?php input_container($cityErr, "Miasto:", $city, "city") ?>
                <?php input_container($addressErr, "Adres:", $address, "address") ?>
                <?php input_container($codeErr, "Kod pocztowy:", $code, "code") ?>
                <?php select_container($countryErr, "Kraj:", $country, "country") ?>
                <?php select_container($stateErr, "Województwo:", $state, "state") ?>
                <div>
                    <button class="px-4 py-2 rounded-md bg-gray-100 border-gray-300" type="submit">Zamień</button>
                </div>
            </form>
        </div>
    </div>
</div>