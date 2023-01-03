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
$error = 0;

$sql = "SELECT * FROM `services`";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['delete'] === "true") {
        $id = $_GET['id'];
        $sql = "DELETE FROM `services` WHERE `services`.`Id` = $id";
        $conn->query($sql);
        $sql = "SELECT * FROM `services`";
        $result = $conn->query($sql);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $price_from = $price_to = $desc = "";
    $id = $_GET['id'];
    if (empty($_POST["name"])) {
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $name)) {
            $error = 1;
        }
    }

    if (empty($_POST["price_from"])) {
    } else {
        $price_from = test_input($_POST["price_from"]);
        if (!preg_match("/^[[0-9-{1}]*$/u", $price_from)) {
            $error = 1;
        }
    }

    if (empty($_POST["price_to"])) {
    } else {
        $price_to = test_input($_POST["price_to"]);
        if (!preg_match("/^[[0-9-{1}]*$/u", $price_to)) {
            $error = 1;
        }
    }

    if (empty($_POST["desc"])) {
    } else {
        $desc = test_input($_POST["desc"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $desc)) {
            $error = 1;
        }
    }

    if ($error == 0) {
        if ($name != "") {
            $sql = "UPDATE `services` SET `Name` = '" . $name . "' WHERE `services`.`Id` = $id";
            $conn->query($sql);
        }
        if ($price_from != "") {
            $sql = "UPDATE `services` SET `Price_8` = " . $price_from . " WHERE `services`.`Id` = $id";
            $conn->query($sql);
        }
        if ($price_to != "") {
            $sql = "UPDATE `services` SET `Price_16` = " . $price_to . " WHERE `services`.`Id` = $id";
            $conn->query($sql);
        }
        if ($desc != "") {
            $sql = "UPDATE `services` SET `Description` = '" . $desc . "' WHERE `services`.`Id` = $id";
            $conn->query($sql);
        }
        $sql = "SELECT * FROM `services`";
        $result = $conn->query($sql);
    }
}

function tale_row($name, $price_from, $price_to, $desc, $id)
{
    $inputid = "input" . $id;
    $textid = "text" . $id;
    $deleteid = "delete" . $id;
    echo '   <div class="flex flex-row items-center w-full rounded-md border border-gray-400 px-4 py-2 bg-gray-100 justify-between text-center gap-2 my-4">
    <div class="flex w-full pl-2" id="' . $textid . '">
        <div class="w-full flex gap-2 items-center">
            <input class="w-1/4 truncate text-center px-2 rounded-md border border-gray-300" value="' . $name . '" disabled></input>
            <input class="w-1/12 text-center px-2 rounded-md border border-gray-300" value="' . $price_from . '" disabled></input>
            <input class="w-1/12 text-center px-2 rounded-md border border-gray-300" value="' . $price_to . '" disabled></input>
            <input class="w-3/4 truncate text-center px-2 rounded-md border border-gray-300" value="' . $desc . '" disabled> </input>
        </div>
    </div>
    <div class="hidden  w-full pl-2 " id="' . $inputid . '">
        <form class="w-full flex gap-2 items-center" method="post" action="' . htmlspecialchars("profile.php?step=5&delete=false&id=" . $id . "") . '">
            <input class="w-1/4 truncate text-center px-2 rounded-md border border-gray-300" value="' . $name . '" name="name"></input>
            <input class="w-1/12 text-center px-2 rounded-md border border-gray-300" value="' . $price_from . '" name="price_from"></input>
            <input class="w-1/12 text-center px-2 rounded-md border border-gray-300" value="' . $price_to . '" name="price_to"></input>
            <input class="w-3/4 truncate text-center px-2 rounded-md border border-gray-300" value="' . $desc . '" name="desc"> </input>
            <button type="submit" class="bg-green-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-green-800">
                <span class="material-symbols-outlined text-white">
                    check
                </span>
            </button>
        </form>
    </div>
    <div class="hidden inset-0 pl-2 absolute bg-white rounded-md border border-gray-300" id="' . $deleteid . '">
        <form class="w-full flex flex-col gap-2 items-center justify-center" method="post" action="' . htmlspecialchars("profile.php?step=5&delete=true&id=" . $id . "") . '">
            <p>Czy na pewno chcesz usunąć <span class="font-bold">"' . $name . '"</span>?</p>
            <div class="flex gap-4">
            <button onclick="toogleDelete(`' . $deleteid . '`)" class="bg-[#00046b] flex items-center px-1 py-1 rounded-md hover:bg-[#0208b5]">
                <span class="px-2 py-1 text-white">
                    Nie
                </span>
            </button>
            <button type="submit" onclick="toogleDelete(`' . $deleteid . '`)" class="bg-red-700 flex items-center px-1 py-1 rounded-md hover:bg-red-800">
                <span class="px-2 py-1 text-white">
                    Tak
                </span>
            </button>
            </div>
        </form>
    </div>

    <div class="flex gap-2">
        <button onclick="toogleEdit(`' . $inputid . '`, `' . $textid . '`)" class="bg-blue-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-blue-800"><span class="material-symbols-outlined text-white">
                edit
            </span></button>
        <button onclick="toogleDelete(`' . $deleteid . '`)" class="bg-red-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-red-800"><span class="material-symbols-outlined text-white">
                delete
            </span></button>
    </div>
</div>';
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
    <div class="flex w-full h-full flex-col gap-10 items-center bg-gray-200 border border-gray-300 px-8 py-8 rounded-xl">
        <h1 class="text-3xl font-bold w-full h-fit">Edytuj usługi</h1>
        <div class="flex flex-col grow items-center gap-2 w-full">
            <div class="w-full">
                <div class="flex flex-row items-center justify-start w-[calc(100%-72px)] h-10 px-4 py-2 text-center font-semibold">
                    <span class="w-1/4">Nazwa</span>
                    <span class="w-1/12">Cena od</span>
                    <span class="w-1/12">Cena do</span>
                    <span class="w-3/4">Opis</span>
                </div>
            </div>
            <div class="grow w-full overflow-auto">
                <?php
                while ($x = $result->fetch_assoc()) {
                    tale_row($x['Name'], $x['Price_8'], $x['Price_16'], $x['Description'], $x['Id']);
                };
                ?>
            </div>

        </div>
    </div>
</div>