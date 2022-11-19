<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    echo($row);
    echo($active);
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
       session_register("myusername");
       $_SESSION['login_user'] = $myusername;
       
       header("location: welcome.php");
    }else {
       $error = "Your Login Name or Password is invalid";
    }
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
        <form class="flex flex-col items-center gap-8" method="POST">
            <div class="flex flex-col">
                <label for="username" class="w-56">Nazwa użytkownika</label>
                <input id="username" type="text" class="w-56 h-8 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="password" class="w-56">Hasło</label>
                <input id="password" type="password" class="w-56 h-8 rounded-md">
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