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
                    echo $_SESSION['login_user'];
                    ?>
                </h1>
                <div class="flex flex-col gap-3">
                    <?php 
                    if($_SESSION['role'] == 'admin'){
                        include('admin.php');
                    }
                    else{
                        include('userLinks.php');
                    }
                    ?>
                </div>
            </div>
            <?php
            if (!isset($_GET['step'])) {
                include('yourData.php');
            } else {
                if ($_GET['step'] == 2) {
                    include('contactData.php');
                }else if ($_GET['step'] == 3) {
                    include('invoiceData.php');
                }  
                else if ($_GET['step'] == 4) {
                    include('changePassword.php');
                } 
                else if ($_GET['step'] == 5) {
                    include('addServices.php');
                } 
                else if ($_GET['step'] == 6) {
                    include('addParts.php');
                } 
                else if ($_GET['step'] == 7) {
                    include('checkOrders.php');
                } 
                else if ($_GET['step'] == 8) {
                    include('usersList.php');
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