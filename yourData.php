<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$myusername = $mypassword = $myemail = $emailErr = $usernameErr = $passwordErr = $repeatPasswordErr = $policyErr =  "";
$error = 0;

$sql = "SELECT `username`, `email` FROM `users`";
$result = $conn->query($sql);
$x = $result -> fetch_assoc();
$myusername = $x['username'];
$myemail = $x['email'];

?>

<div class="flex h-full w-full ">
    <div class="flex w-full flex-col gap-10 flex flex-col gap-6 items-center bg-gray-200 border border-gray-300 px-8 py-8 rounded-xl">
        <h1 class="text-3xl font-bold w-full">Twoje Dane</h1>
        <div class="flex w-full">
            <form class="flex flex-col items-center gap-8 w-full">
            <div class="flex flex-col">
                <label for="email" class="w-80">Email</label>
                <input id="email" value=<?php echo $myemail ?> name="email" type="email" class="w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]">
                <span class="error"> <?php echo $emailErr; ?></span>
            </div>
            <div class="flex flex-col">
                <label for="username" class="w-80">Nazwa użytkownika</label>
                <input id="username" value=<?php echo $myusername ?> name="username" type="text" class="w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]" >
                <span class="error w-56"> <?php echo $usernameErr; ?></span>
            </div>
            <div>
                <button type="submit">Zamień</button>
            </div>
            </form>
        </div>
    </div>
</div>

