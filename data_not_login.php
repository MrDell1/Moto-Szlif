<div class="flex flex-col align-center items-center">
    <div class='my-2'><span class='rounded-full border-gray-400 border-2 px-2 py-2 font-semibold'>4</span></div>
    <h2>Krok czwarty </h2>
    <span>Zaloguj się bądź zarejestruj by dokończyć zamówienie</span>
</div>
<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$myusername = $mypassword = $usernameErr = $passwordErr = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['data_not_login']) && $_GET['data_not_login'] == 'true') {
    if ($_POST['foo'] == 'Anuluj') {
        $_SESSION['step'] = 3;
        header("location: order.php");
    }
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $myusername = test_input($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $mypassword = test_input($_POST["password"]);
    }
    $sql = "SELECT `password`, `role`, `id` FROM users WHERE username = '$myusername'";
    $result = $conn->query($sql);
    $x = $result->fetch_assoc();
    $password = $x['password'];
    $verify = password_verify($mypassword, $password);
    if ($verify) {
        $role = $x['role'];
        $_SESSION['role'] = $role;
        $_SESSION['login_user'] = $myusername;
        $id = $x['id'];
        $_SESSION['id'] = $id;
        header("location: order.php");
    } else {
        $error = "Twoja nazwa użytkownika lub hasło jest niepoprawne";
        //exit;
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
<div class="flex flex-row">

    <div class="flex flex-col items-center justify-center h-full py-8 gap-16 w-full">
        <div>
            <span class="text-2xl">
                Zaloguj się
            </span>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?data_not_login=true" class="flex flex-col items-center gap-8" method="POST">
            <div class="flex flex-col">
                <label for="username" class="w-56">Nazwa użytkownika</label>
                <input id="username" name="username" type="text" class="w-56 h-8 rounded-md">
                <span class="error"> <?php echo $usernameErr; ?></span>
                <span class="error w-56"> <?php echo $error; ?></span>
            </div>
            <div class="flex flex-col">
                <label for="password" class="w-56">Hasło</label>
                <input id="password" name="password" type="password" class="w-56 h-8 rounded-md">
                <span class="error"> <?php echo $passwordErr; ?></span>
                <span class="error w-56"> <?php echo $error; ?></span>
            </div>
            <input type="submit" value="Zaloguj się" class="w-48 rounded-xl border-0 h-8 cursor-pointer">
        </form>
        <div>
            <span>Nie masz konta? <a href="signup.php" class="text-[#c70f0f]">Zarejestruj się</a></span>
        </div>
    </div>

    <div>

    </div>
</div>