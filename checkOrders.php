<?php
    if($_SESSION['role'] != 'admin'){
        header("location: profile.php");
    }
?>