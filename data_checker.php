<?php
session_start();

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['country']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['address']) && isset($_POST['code'])){
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['tel'] = $_POST['tel'];
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['code'] = $_POST['code'];

}

//header("Location:order.php?step=2")
?>