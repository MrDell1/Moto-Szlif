<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['add']) && $_GET['add'] == 'true') {
    $name = $price_from = $price_to = $desc = "";
    if (empty($_POST["name"])) {
        $error = 1;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $name)) {
            $error = 1;
        }
    }

    if (empty($_POST["price_from"])) {
        $error = 1;
    } else {
        $price_from = test_input($_POST["price_from"]);
        if (!preg_match("/^[[0-9-{1}]*$/u", $price_from)) {
            $error = 1;
        }
    }

    if (empty($_POST["price_to"])) {
        $error = 1;
    } else {
        $price_to = test_input($_POST["price_to"]);
        if (!preg_match("/^[[0-9-{1}]*$/u", $price_to)) {
            $error = 1;
        }
    }

    if (empty($_POST["desc"])) {
        $error = 1;
    } else {
        $desc = test_input($_POST["desc"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $desc)) {
            $error = 1;
        }
    }

    if ($error == 0) {
        //INSERT INTO `services` (`Id`, `Name`, `Description`, `Price_8`, `Price_16`, `Parts`) VALUES (NULL, '2', '2', '3', '4', '');
        $sql = "INSERT INTO `services` (`Id`, `Name`, `Description`, `Price_8`, `Price_16`, `Parts`) VALUES (NULL, '$name',  '$desc', '$price_from', '$price_to', '')";
        $conn->query($sql);
        $sql = "SELECT * FROM `services`";
        $result = $conn->query($sql);
    }
}

?>

<div class="w-full">
    <button onclick="toggleAddService()" class="bg-blue-700 flex justify-center h-full px-1 py-1 rounded-md hover:bg-blue-800 text-white w-full">Dodaj +</button>
    <div id="add_service" class="hidden flex-col gap-2 mt-2">
        <div class="flex flex-row items-center justify-start w-[calc(100%-72px)] h-10 px-4 py-2 text-center font-semibold">
            <span class="w-1/4">Nazwa</span>
            <span class="w-1/12">Cena od</span>
            <span class="w-1/12">Cena do</span>
            <span class="w-3/4">Opis</span>
        </div>
        <form class="w-full flex gap-2 items-center" method="post" action="<?php echo htmlspecialchars(" profile.php?step=5&add=true") ?>">
            <input class="w-1/4 truncate text-center px-2 rounded-md border border-gray-300 bg-white" value="" name="name"></input>
            <input type="number" class="w-1/12 text-center px-2 rounded-md border border-gray-300 bg-white" value="" name="price_from"></input>
            <input type="number" class="w-1/12 text-center px-2 rounded-md border border-gray-300 bg-white" value="" name="price_to"></input>
            <input class="w-3/4 truncate text-center px-2 rounded-md border border-gray-300 bg-white" value="" name="desc"> </input>
            <button type="submit" class="bg-green-700 flex items-center h-full px-1 py-1 rounded-md hover:bg-green-800">
                <span class="material-symbols-outlined text-white">
                    check
                </span>
            </button>
        </form>
        <?php 
        if(isset($error) && $error == 1){
            echo '<span class="font-semibold w-full text-red-700">Coś poszło nie tak</span>';
        }
        ?>
    </div>
</div>
<script>
    function toggleAddService() {
        document.getElementById("add_service").classList.toggle('hidden');
        document.getElementById("add_service").classList.toggle('flex');
    }
</script>