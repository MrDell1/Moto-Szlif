<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$oldPassword = $newPassword = $repetedPassword = "";
$oldPasswordErr = $newPasswordErr = $repetedPasswordErr = "";
$error = 0;




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT `password` FROM users WHERE id = $_SESSION[id]";
    $result = $conn->query($sql);
    $x = $result->fetch_assoc();
    $password = $x['password'];

    if (!empty($_POST["oldPassword"])) {
        $verify = password_verify($oldPassword, $password);
        if (!$verify) {
            $error = 1;
            $oldPasswordErr = "Twoja hasło jest niepoprawne";
        }
    } else {
        $error = 1;
        $oldPasswordErr = "Twoja hasło jest niepoprawne";
    }

    if (!empty($_POST["newPassword"])) {
        $newPassword = test_input($_POST["newPassword"]);
        if (strlen($newPassword) < 8) {
            $newPasswordErr = "Hasło jest za krótkie";
            $error = 1;
        }
    }

    if (!empty($_POST["repetedPassword"])) {
        $repetedPassword = test_input($_POST["repetedPassword"]);
        if ($newPassword !== $repetedPassword) {
            $newPasswordErr = "Hasła nie są takie same";
            $repetedPasswordErr = "Hasła nie są takie same";
            $error = 1;
        }
    }

    if ($error == 0) {
        $hash = password_hash(
            $newPassword,
            PASSWORD_DEFAULT,
            array('cost' => 9)
        );
        $sql = "UPDATE `users` SET `password`='$hash' WHERE id = $_SESSION[id]";
        $result = $conn->query($sql);
    }

}

function input_container($err, $label, $session_name, $id)
{
    echo "<div class='flex flex-col'>";
    echo    "<label class='w-80' for='" . $id . "'>" . $label . "</label>";
    echo    "<span class='error'>";
    if (isset($err)) {
        echo $err;
    }
    echo    "</span>";
    echo    " <input type='password' class='px-2 py-2 w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]' name='" . $id . "' id='" . $id . "' ";
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
        <h1 class="text-3xl font-bold w-full">Dane do faktury</h1>
        <div class="flex w-full">
            <form class="flex flex-col items-center gap-8 w-full" method="post" action="<?php echo htmlspecialchars('profile.php?step=4'); ?>">
                <?php input_container($oldPasswordErr, "Aktualne hasło:", $oldPassword, "password") ?>
                <?php input_container($newPasswordErr, "Nowe hasło:", $newPassword, "newPpassword") ?>
                <?php input_container($repetedPasswordErr, "Powtórz hasło:", $repetedPassword, "repetedPassword") ?>
                <div>
                    <button class="px-4 py-2 rounded-md bg-gray-100 border-gray-300" type="submit">Zamień</button>
                </div>
            </form>
        </div>
    </div>
</div>