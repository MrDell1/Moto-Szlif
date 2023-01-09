<?php
session_start();

$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}
if (isset($_COOKIE['user_remember'])) {
    $id = $_COOKIE['user_remember'];
    $sql = "SELECT `username`, `role` FROM users WHERE id = '$id'";
    $result = $conn->query($sql);
    $x = $result->fetch_assoc();
    $role = $x['role'];
    $_SESSION['role'] = $role;
    $_SESSION['login_user'] = $x['username'];;
    $_SESSION['id'] = $id;
    if($role == 'admin'){
    header("location: profile.php?step=5");
    }
    else{
    header("location: profile.php");
    }

}

$myusername = $mypassword = $usernameErr = $passwordErr = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        if (isset($_POST['remember']) && $_POST['remember'] == 'remember') {
            $cookie_name = "user_remember";
            $cookie_value = $id;
            setcookie($cookie_name, $cookie_value, time() + (7200), "/"); // 86400 = 1 day
        }
        header("location: index.php");
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
                Zaloguj się
            </span>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="flex flex-col items-center gap-8" method="POST">
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
            <div class="flex flex-row gap-4 items-center">
                <label for="remember" class="max-w-56">Zapamiętaj mnie</label>
                <input value="remember" name="remember" type="checkbox" class="w-56 h-8 rounded-md">
            </div>
            <input type="submit" value="Zaloguj się" class="w-48 rounded-xl border-0 h-8 cursor-pointer">
        </form>
        <div>
            <span>Nie masz konta? <a href="signup.php" class="text-[#c70f0f]">Zarejestruj się</a></span>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>

</body>

</html>