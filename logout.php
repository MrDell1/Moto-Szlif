<?php
function logout(){
    session_start();
    session_unset();
    session_destroy();
    if (isset($_COOKIE['user_remember'])) {
        unset($_COOKIE['user_remember']); 
        setcookie('user_remember', null, -1, '/'); 
    }
    //setcookie("user_remember", "", time());
    header("location: index.php");
}
logout();
