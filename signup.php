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
        <form class="flex flex-col items-center gap-8">
        <div class="flex flex-col">
                <label for="email" class="w-56">Email</label>
                <input id="email" type="text" class="w-56 h-8 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="username" class="w-56">Nazwa użytkownika</label>
                <input id="username" type="text" class="w-56 h-8 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="password" class="w-56">Hasło</label>
                <input id="password" type="password" class="w-56 h-8 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="repeatPassword" class="w-56">Powtórz hasło</label>
                <input id="repeatPassword" type="password" class="w-56 h-8 rounded-md">
            </div>
            <div class="flex flex-row w-56 justify-between items-center ">
                <label for="policy" class="text-sm">Akceptuj politykę prywatności</label>
                <input id="policy" type="checkbox" class="rounded-md w-4 h-4">
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