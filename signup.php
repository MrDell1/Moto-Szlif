<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$myusername = $mypassword = $myemail = $emailErr = $usernameErr = $passwordErr = $repeatPasswordErr = $policyErr =  "";
$error = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email jest wymagany";
        $error = 1;
    } else {
        $myemail = test_input($_POST["email"]);
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Nazwa użytkowniak jest wymagana";
        $error = 1;
    } else {
        $myusername = test_input($_POST["username"]);
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Hasło jest wymagane";
        $error = 1;
    } else {
        $mypassword = test_input($_POST["password"]);
    }

    if (empty($_POST["repeatPassword"]) || $_POST["password"] != $_POST["repeatPassword"]) {
        $repeatPasswordErr = "Hasła nie są identyczne";
        $error = 1;
    }

    if (empty($_POST["policy"])) {
        $policyErr = "Zaakcpetuj politykę prywatnosci";
        $error = 1;
    }


    if ($error == 0) {
        $hash = password_hash(
            $mypassword,
            PASSWORD_DEFAULT,
            array('cost' => 9)
        );
        $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$myusername', '$hash', '$myemail')";
        $result = $conn->query($sql);
        header("location: index.php");
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <?php
    include('head.php');
    ?>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <div class="flex flex-col px-48 items-center justify-center h-full py-8 gap-16 w-full">
        <div>
            <span class="text-2xl">
                Zarejestruj się
            </span>
        </div>
        <form class="flex flex-col items-center gap-8" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="flex flex-col">
                <label for="email" class="w-56">Email</label>
                <input id="email" name="email" type="email" class="w-56 h-8 rounded-md">
                <span class="error"> <?php echo $emailErr; ?></span>
            </div>
            <div class="flex flex-col">
                <label for="username" class="w-56">Nazwa użytkownika</label>
                <input id="username" name="username" type="text" class="w-56 h-8 rounded-md">
                <span class="error w-56"> <?php echo $usernameErr; ?></span>
            </div>
            <div class="flex flex-col">
                <label for="password" class="w-56">Hasło</label>
                <input id="password" name="password" type="password" class="w-56 h-8 rounded-md">
                <span class="error"> <?php echo $passwordErr; ?></span>
            </div>
            <div class="flex flex-col">
                <label for="repeatPassword" class="w-56">Powtórz hasło</label>
                <input id="repeatPassword" name="repeatPassword" type="password" class="w-56 h-8 rounded-md">
                <span class="error"> <?php echo $repeatPasswordErr; ?></span>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row w-56 justify-between items-center ">
                    <label for="policy" class="text-sm">Akceptuj politykę prywatności</label>
                    <input id="policy" name="policy" type="checkbox" class="rounded-md w-4 h-4">
                </div>
                <span class="error"> <?php echo $policyErr; ?></span>
            </div>
            <input type="submit" value="Zarejestruj się" class="w-48 rounded-xl border-0 h-8 cursor-pointer">
        </form>
        <div>
            <span>Masz już konto? <a href="login.php" class="text-[#c70f0f]">Zaloguj się</a></span>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>