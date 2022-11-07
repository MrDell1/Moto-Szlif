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
    <div class="flex flex-col px-48 max-w-[12rem]">

        <form class="flex flex-col">
            <input id="username" type="text">
            <label for="username">Nazwa użytkownika</label>
            <input id="password" type="password">
            <label for="password">Hasło</label>
        </form>

    </div>
</body>

</html>