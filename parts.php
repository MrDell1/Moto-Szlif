<div class='number'><span>2</span></div>
<h2>Krok drugi </h2>
<span>Zaznacz które części chcesz wymienić na nowe w swojej głowicy. <br> Jeśli nie chcesz nic wymieniać przejdz do
    następnego kroku.</span>
</div>
<div id="form" style="max-width: 400px!important">
    <div id="data">

<?php
$conn = mysqli_connect("localhost", 'root', '', 'm-s');
if (mysqli_connect_errno()) {
    echo "Błąd połączenia nr: " . mysqli_connect_errno();
    echo "Opis błędu: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM `parts`";
$result = $conn->query($sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        while($x = $result->fetch_assoc()){
            $id = $x['Id_part'];                       
           if(isset($_POST[$id])){
            if($_POST[$id] == 'on'){

                $_SESSION['parts_'.$id] = $x['Name'];
                $_SESSION['parts_script_'.$id] = 1;
            }                  
                                    
           }
           else{
            unset($_SESSION['parts_'.$id]);
            $_SESSION['parts_script_'.$id] = 0;
        }
        }

        header("Location:order.php?step=3");
    }


?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?step=2" method='POST'>
            <div class='data_text'>
                <label for="part_valve">Zawory:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_valve'])){
                  echo "checked";}?> name="1" id="1">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_sealant">Uszczelniacze:</label>

                <input type="checkbox" <?php if(!empty($_SESSION['part_sealant'])){
                  echo "checked";}?> name="2" id="2">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_pusher">Popychacze:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_pusher'])){
                 echo "checked";}?> name="3" id="3">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_fence">Prowadnice:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_fence'])){
                  echo "checked";}?> name="4" id="4">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_valve_seats">Gniazda zaworowe:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_valve_seats'])){
                  echo "checked";}?> name="5" id="5">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_vortex">Komory wirowe:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_vortex'])){
                  echo "checked";}?> name="6" id="6">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_sime">Simeringi:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_sime'])){
                  echo "checked";}?> name="7" id="7">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <input type="submit" value="Następny krok">
            </div>
        </form>
    </div>
</div>