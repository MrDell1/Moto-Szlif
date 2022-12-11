<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$myusername = $mypassword = $myemail = $emailErr = $usernameErr = $passwordErr = $repeatPasswordErr = $policyErr =  "";
$error = 0;

?>

<div class="flex h-full w-full ">
    <div class="flex w-full flex-col gap-10 flex flex-col gap-6 items-center bg-gray-200 border border-gray-300 px-8 py-8 rounded-xl">
        <h1 class="text-3xl font-bold w-full">Twoje Dane Kontaktowe</h1>
        <div class="flex w-full">
            <form class="flex flex-col items-center gap-8">
            <div class="flex flex-col">
                <label for="email" class="w-80">Email</label>
                <input id="email" name="email" type="email" class="w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]">
                <span class="error"> <?php echo $emailErr; ?></span>
            </div>
            <div class="flex flex-col">
                <label for="username" class="w-80">Nazwa użytkownika</label>
                <input id="username" name="username" type="text" class="w-80 h-8 bg-white rounded-md border-gray-400 border-[1px]" >
                <span class="error w-56"> <?php echo $usernameErr; ?></span>
            </div>
            </form>
        </div>
    </div>
</div>

