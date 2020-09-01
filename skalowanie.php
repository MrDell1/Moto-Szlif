<?php
require "class.img.php";
$img = new Image("IMG/" . $_GET['img']);
    $img -> SetSize(180,180);
    $img -> send();
    ?>