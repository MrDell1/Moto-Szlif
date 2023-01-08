<div class="flex flex-col align-center items-center">
    <div class='my-2'><span class='rounded-full border-gray-400 border-2 px-2 py-2 font-semibold'>2</span></div>
    <h2>Krok drugi </h2>
    <span>Zaznacz które części chcesz wymienić na nowe w swojej głowicy. <br> Jeśli nie chcesz nic wymieniać przejdz do
        następnego kroku.</span>
</div>
<div id="form">
    <div id="data">

        <?php
        $conn = mysqli_connect("localhost", 'root', '', 'm-s');
        if (mysqli_connect_errno()) {
            echo "Błąd połączenia nr: " . mysqli_connect_errno();
            echo "Opis błędu: " . mysqli_connect_error();
            exit();
        }

        $sql = "SELECT * FROM `parts`";
        $result = $conn->query($sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['parts']) && $_GET['parts'] == 'true') {
            if ($_POST['foo'] == 'Wstecz') {
                unset($_SESSION['step']);
                header("location: order.php");
                exit();
            }

            $result = $conn->query($sql);

            while ($x = $result->fetch_assoc()) {

                $id = $x['Id_part'];
                if (isset($_POST[$id]) && $_POST[$id] == 'on') {
                    $_SESSION['parts_' . $id] = $x['Name'];
                    $_SESSION['parts_script_' . $id] = 1;
                } else {
                    unset($_SESSION['parts_' . $id]);
                    unset($_SESSION['parts_script_' . $id]);
                }
            }

             $_SESSION['step'] = 3;
             header("location: order.php");
        }

        function checkShow($name, $id)
        {
            echo    '<div class="flex flex-row justify-between items-center">
                <label class="font-bold py-1" for=' . $id . '>' . $name . '</label>
                <input type="checkbox"   ';
            if (isset($_SESSION['parts_' . $id])) {
                echo "checked ";
            }
            echo "name=" . $id . " value='on'>
                </div>";
        }


        ?>


        <form class="flex flex-col gap-8 items-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?parts=true" method='POST'>
            <div class="flex flex-row gap-10 w-full justify-center">
                <div class="flex flex-col gap-4">
                    <?php
                    while ($x = $result->fetch_assoc()) {
                        checkShow($x['Name'], $x['Id_part']);
                    };
                    ?>

                </div>
            </div>
            <div class='flex flex-row gap-4 w-full'>
                <input type="submit" class="hover:bg-[#3801ff] bg-[#c70f0f] w-full text-white rounded-md border-color-[#d1d5db] h-10 border-[1px]" value="Wstecz" name="foo" />
                <input class="w-full rounded-md border-color-[#d1d5db] h-10 border-[1px]" type="submit" value="Następny krok" name="foo" />
            </div>
        </form>
    </div>
</div>