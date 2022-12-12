<?php
if ($_SESSION['role'] != 'admin') {
    header("location: profile.php");
}

$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$company = $nip = "";
$companyErr = $nipErr = "";
$error = 0;

$sql = "SELECT * FROM `services`";
$result = $conn->query($sql);
$x = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["company"])) {
        if (isset($company)) {
            unset($company);
        }
    } else {
        $company = test_input($_POST["company"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $company)) {
            $companyErr = "Dozwolone są tylko liczby i litery";
            $error = 1;
        } else {
            $company = $company;
            $companyErr = "";
        }
    }

    if (empty($_POST["nip"])) {
        if (isset($nip)) {
            unset($nip);
        }
    } else {
        $nip = test_input($_POST["nip"]);
        if (!preg_match("/^[[0-9-{1}]*$/u", $nip)) {
            $nipErr = "Dozwolone są tylko liczby";
            $error = 1;
        } else {
            $nip = $nip;
            $nipErr = "";
        }
    }
    if ($error == 0) {
        //$sql = "UPDATE `customer` SET `Company`='" . $company . "', `NIP`='" . $nip . "' WHERE Id_Usr = $_SESSION[id]";
        // $conn->query($sql);
    }
}

function tale_row($err, $label, $session_name, $id)
{
    echo "<div class='flex flex-col'>";
    echo    "<label class='w-80' for='" . $id . "'>" . $label . "</label>";
    echo    "<span class='error'>";
    if (isset($err)) {
        echo $err;
    }
    echo    "</span>";
    echo    " <input type='text' class='px-2 py-2 w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]' name='" . $id . "' id='" . $id . "' ";
    if (!empty($session_name)) {
        echo "value='" . $session_name . "'";
    }
    echo    " > </div>";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<div class="flex h-full w-full ">
    <div class="flex w-full flex-col gap-10 flex flex-col gap-6 items-center bg-gray-200 border border-gray-300 px-8 py-8 rounded-xl">
        <h1 class="text-3xl font-bold w-full">Dodaj usługi</h1>
        <div class="flex flex-col items-center gap-2 w-full">

            <div class="flex flex-row items-center justify-between w-full px-4 py-2 text-center font-semibold">
                <span class="w-1/4">Nazwa</span>
                <span class="w-1/12">Cena od</span>
                <span class="w-1/12">Cena do</span>
                <span class="w-3/4">Opis</span>
            </div>
            <div class="flex flex-row items-center w-full rounded-md border border-gray-400 px-4 py-2 bg-gray-100 justify-between text-center gap-2">

                <div class="flex items-center w-full pl-2 1" id="text1">
                    <span class="w-1/4 truncate">Regulacja luzów zaworowych</span>
                    <span class="w-1/12">50</span>
                    <span class="w-1/12">60</span>
                    <span class="w-3/4 truncate">Zalecane przy wymianie popychaczy, polega na dobraniu odpowiednich popychaczy do każdego zaworu według norm producenta</span>
                </div>
                <div class="hidden  w-full pl-2 " id="input1">
                    <form class="w-full flex gap-2 items-center" method="post" action="<?php echo htmlspecialchars("profile.php?step=5"); ?>">
                        <input class="w-1/4 truncate text-center px-2 rounded-md border border-gray-300" value="Regulacja luzów zaworowych"></input>
                        <input class="w-1/12 text-center px-2 rounded-md border border-gray-300" value="50"></input>
                        <input class="w-1/12 text-center px-2 rounded-md border border-gray-300" value="60"></input>
                        <input class="w-3/4 truncate text-center px-2 rounded-md border border-gray-300" value="Zalecane przy wymianie popychaczy, polega na dobraniu odpowiednich popychaczy do każdego zaworu według norm producenta"> </input>
                        <button type="submit" class="bg-green-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-green-800">
                            <span class="material-symbols-outlined text-white">
                                check
                            </span>
                        </button>
                    </form>
                </div>

                <div class="flex gap-2">
                    <button onclick="toogleEdit('input1', 'text1')" class="bg-blue-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-blue-800"><span class="material-symbols-outlined text-white">
                            edit
                        </span></button>
                    <button class="bg-red-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-red-800"><span class="material-symbols-outlined text-white">
                            delete
                        </span></button>
                </div>
            </div>
            <!-- <div>
            <button class="px-4 py-2 rounded-md bg-gray-100 border-gray-300" type="submit">Zamień</button>
        </div> -->

        </div>
    </div>
</div>