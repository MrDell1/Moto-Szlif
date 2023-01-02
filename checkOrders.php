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

$sql = "SELECT * FROM `orders`";
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
    $state = "";
    $id = $_GET['id'];
    if (empty($_POST["state"])) {
    } else {
        $state = test_input($_POST["state"]);
    }
    if ($error == 0) {
        if ($state != "") {
            $sql = "UPDATE `orders` SET `state` = '" . $state . "' WHERE `orders`.`Id_order` = $id";
            $conn->query($sql);
        }
        $sql = "SELECT * FROM `orders`";
        $result = $conn->query($sql);
        
    }
}

function tale_row($services, $parts, $mark, $model, $year, $capacity, $fuel, $engNum, $name, $lName, $number, $state, $id)
{
    $inputid = "input" . $id;
    $textid = "text" . $id;
    $expandId = "expand" . $id;
    echo '   <div class="flex flex-row items-center w-full rounded-md border border-gray-400 px-4 py-2 bg-gray-100 text-center gap-2 my-4">
    <div class="flex flex-col gap-2 w-full">
    <div class="flex w-full pl-2" id="' . $textid . '">
        <div class="w-full flex gap-2 items-center">
            <textarea  class="w-1/4 bg-[#e5e7eb] text-center px-2 rounded-md border border-gray-300" disabled>' . $services . '</textarea >
            <textarea class="w-1/4 bg-[#e5e7eb] text-center px-2 rounded-md border border-gray-300" disabled>' . $parts . '</textarea>
            <input class="w-1/4 text-center px-2 rounded-md border border-gray-300" value="' . $name . '" disabled></input>
            <input class="w-1/4 truncate text-center px-2 rounded-md border border-gray-300" value="' . $number . '" disabled> </input>
        </div>
    </div>
    <div class="hidden w-full pl-2 " id="' . $inputid . '">
        <form class="w-full flex gap-2 items-center" method="post" action="' . htmlspecialchars("profile.php?step=7&delete=false&id=" . $id . "") . '">
                <select class="w-full h-full text-center px-2 rounded-md border border-gray-300" value="' . $state . '" name="state">
                    <option value="Gotowe">Gotowe</option>
                    <option value="W trakcie">W trakcie</option>
                    <option value="Oczekujące">Oczekujące</option>
                </select>
                <button type="submit" class="bg-green-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-green-800">
                <span class="material-symbols-outlined text-white">
                    check
                </span>
            </button>
        </form>
    </div>
    <div class="hidden w-full pl-2 " id="' . $expandId . '">
        <div class="w-full flex flex-col gap-2">
            <div class="w-full flex gap-2 items-center">
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Marka</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $mark . '" disabled></input>
                </div>
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Model</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $model . '" disabled></input>
                </div>
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Rok produkcji</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $year . '" disabled></input>
                </div>
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Pojemność</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $capacity . '" disabled> </input>
                </div>
            </div>
            <div class="w-full flex gap-2 items-center">
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Rodzaj paliwa</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $fuel . '" disabled></input>
                </div>
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Numer silnika</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $engNum . '" disabled></input>
                </div>
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Nazwisko</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $lName . '" disabled></input>
                </div>
                <div class="flex flex-col w-1/3">
                <label class="font-semibold">Stan</label>
                <input class="w-full text-center px-2 rounded-md border border-gray-300" value="' . $state . '" disabled> </input>
                </div>
        
            </div>
        </div>
        </div>
    </div>

    <div class="flex gap-2">
        <button onclick="toogleEdit(`' . $inputid . '`, `' . $textid . '`)" class="bg-blue-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-blue-800">
            <span class="material-symbols-outlined text-white">
                edit
            </span>
        </button>
        <button onclick="toogleExpand(`' . $expandId . '`)" class="bg-gray-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-gray-800">
            <span class="material-symbols-outlined text-white">
                expand_more
            </span>
        </button>
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
        <h1 class="text-3xl font-bold w-full h-fit">Sprawdź zamówienia</h1>
        <div class="flex flex-col items-center gap-2 w-full">
            <div class="w-full">
                <div class="flex flex-row items-center justify-start gap-2 w-[calc(100%-72px)] h-10 px-4 py-2 text-center font-semibold">
                    <span class="w-1/4">Usuługi</span>
                    <span class="w-1/4">Części</span>
                    <span class="w-1/4">Imię</span>
                    <span class="w-1/4">Numer telefonu</span>
                </div>
            </div>
            <div class="w-full overflow-auto">
                <?php
                while ($x = $result->fetch_assoc()) {
                    $headId = $x['Id_head'];
                    $sql = "SELECT * FROM `head_data` WHERE `head_data`.`Id_head`=$headId ";
                    $head = $conn->query($sql);
                    $headReasult = $head->fetch_assoc();

                    $customerId = $x['Id_Usr'];
                    $sql = "SELECT * FROM `customer` WHERE `customer`.`Id_Usr`=$customerId ";
                    $customer = $conn->query($sql);
                    $customerResult = $customer->fetch_assoc();

                    tale_row(
                        $x['Name_services'],
                        $x['Name_parts'],
                        $headReasult['Mark'],
                        $headReasult['Model'],
                        $headReasult['Year'],
                        $headReasult['Capacity'],
                        $headReasult['Fuel'],
                        $headReasult['Eng_num'],
                        $customerResult['Fname'],
                        $customerResult['Lname'],
                        $customerResult['Number'],
                        $x['State'],
                        $x['Id_order']
                    );
                };
                ?>
            </div>
        </div>
    </div>
</div>