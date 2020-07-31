<?php
session_start();
$_SESSION=array();
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
echo "Błąd połączenia nr: " . mysqli_connect_errno();
echo "Opis błędu: " . mysqli_connect_error();
exit();
}
if(isset($_POST['car'])){
    $car = $_POST['car'];
}
if(isset($_POST['code'])){
    $code = $_POST['code'];
}

echo $car;
echo $code;


/*
$sql = " SELECT * FROM moto-szlif WHERE marka = $car "

$result = $conn->query($sql);
$result_rows = $result->num_rows;

$i=1;
While($x = $result->fetch_assoc()){
$i++;
    $sql_id = "SELECT * FROM `zdjecia` WHERE Id_head=" . $x['Id'];
        if($result_id = $conn->query($sql_id)){
            $h=mysqli_fetch_assoc($result_id);  
        }
    if($i % 3 == 0 || $i == 1){
        echo "<div  class=srow>";
    }
    echo "<a href='sklep.php?head_id=". $x['Id'] ."' >";
    echo "<div class='bloczek'>";
    echo "<div class='zdj'>";
    echo "<img  class='zdj' src='skalowanie.php?img=". $x['Id'] . "/" . $h['Id']."'>"; 
    echo "</div>";
    echo "<div class='cena'> ". $x['Nazwa'] ."<br>" . $x['Cena'] . " </div>";
    echo "</div>"
    echo "</a>";
   
    if($i % 3 == 0 || $i == 1){
        echo "</div>";
    }
}
*/
header("Location: sklep.php");
?>