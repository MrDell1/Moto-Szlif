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

$sql = "SELECT * FROM `parts`";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['delete'] === "true") {
        $id = $_GET['id'];
        $sql = "DELETE FROM `parts` WHERE `parts`.`Id_part` = $id";
        $conn->query($sql);
        $sql = "SELECT * FROM `parts`";
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

    if ($error == 0) {
        if ($name != "") {
            $sql = "UPDATE `parts` SET `Name` = '" . $name . "' WHERE `parts`.`Id_part` = $id";
            $conn->query($sql);
        }
        $sql = "SELECT * FROM `parts`";
        $result = $conn->query($sql);
    }
}

function tale_row($name, $id)
{
    $inputid = "input" . $id;
    $textid = "text" . $id;
    $deleteid = "delete" . $id;
    echo '   <div class="flex flex-row items-center w-full rounded-md border border-gray-400 px-4 py-2 bg-gray-100 justify-between text-center gap-2 my-4">
    <div class="flex w-full pl-2" id="' . $textid . '">
        <div class="w-full flex gap-2 items-center">
            <input class="w-full truncate text-center px-2 rounded-md border border-gray-300" value="' . $name . '" disabled></input>
        </div>
    </div>
    <div class="hidden  w-full pl-2 " id="' . $inputid . '">
        <form class="w-full flex gap-2 items-center" method="post" action="' . htmlspecialchars("profile.php?step=6&delete=false&id=" . $id . "") . '">
            <input class="w-full truncate text-center px-2 rounded-md border border-gray-300" value="' . $name . '" name="name"></input>
            <button type="submit" class="bg-green-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-green-800">
                <span class="material-symbols-outlined text-white">
                    check
                </span>
            </button>
        </form>
    </div>
    <div class="hidden inset-0 pl-2 absolute bg-white rounded-md border border-gray-300" id="' . $deleteid . '">
        <form class="w-full flex flex-col gap-2 items-center justify-center" method="post" action="' . htmlspecialchars("profile.php?step=6&delete=true&id=" . $id . "") . '">
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
        <h1 class="text-3xl font-bold w-full h-fit">Edytuj części</h1>
        <div class="flex flex-col items-center gap-2 w-full">

            <div class="flex flex-row items-center justify-between w-full h-10 px-4 py-2 text-center font-semibold">
                <span class="w-full">Nazwa</span>
            </div>
            <div class="w-full grow overflow-auto">
                <?php
                while ($x = $result->fetch_assoc()) {
                    tale_row($x['Name'], $x['Id_part']);
                };
                ?>
            </div>

        </div>
    </div>
</div>