<?php
session_start();
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
    <main class="flex flex-col h-[60vh] m-0">
        <div class="flex flex-row px-8 items-center justify-start h-full py-8 gap-16 w-full">
            <div
                class="flex flex-col gap-6 items-center bg-gray-200 border h-full border-gray-300 px-8 py-8 rounded-xl">
                <h1 class="text-3xl font-bold">
                    <?php
                    echo $_SESSION['login_user']
                    ?>
                </h1>
                <div class="flex flex-col gap-3">
                    <a  href="profile.php" class="hover:font-semibold w-40 px-2 py-2">
                        <p>Twoje dane</p>
                    </a>
                    <a href="profile.php?step=2" class="hover:font-semibold w-40 px-2 py-2">
                        <p>Dane kontaktowe</p>
                    </a>
                    <a href="profile.php?step=3" class="hover:font-semibold w-40 px-2 py-2">
                        <p>Zmiana hasła</p>
                    </a>
                    <a href="profile.php?step=4" class="hover:font-semibold w-40 px-2 py-2">
                        <p>Wyloguj</p>
                    </a>
                </div>
            </div>
            <?php
            if (!isset($_GET['step'])) {
                include('yourData.php');
            } else {
                if ($_GET['step'] == 2) {
                    include('contactData.php');
                } else if ($_GET['step'] == 3) {
                    include('changePassword.php');
                } else if ($_GET['step'] == 4) {
                    include('logout.php');
                }
            }
            ?>
        </div>
    </main>
    <?php
    include('footer.php');
    ?>

</body>

</html>