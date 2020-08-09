<div class='number'><span>2</span></div>
<h2>Krok drugi </h2>
<span>Zaznacz które części chcesz wymienić na nowe w swojej głowicy. <br> Jeśli nie chcesz nic wymieniać przejdz do
    następnego kroku.</span>
</div>
<div id="form" style="max-width: 400px!important">
    <div id="data">

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["part_valve"])) {
      $_SESSION['part_valve'] = 1;     
    } 
    else{
        $_SESSION['part_valve'] = 0;    
    }

    

    if (!empty($_POST["part_sealant"])) {
        $_SESSION['part_sealant'] = 1;
    } 
    else{
        $_SESSION['part_sealant'] = 0;    
    }
    

    if (!empty($_POST["part_pusher"])) {
        $_SESSION['part_pusher'] = 1;
    } 
    else{
        $_SESSION['part_pusher'] = 0;    
    }

    if (!empty($_POST["part_fence"])) {
      $_SESSION['part_fence'] = 1;
    } 
    else{
        $_SESSION['part_fence'] = 0;    
    }

    if (!empty($_POST["part_vortex"])) {
        $_SESSION['part_vortex'] = 1;
    }
    else{
        $_SESSION['part_vortex'] = 0;    
    }
      
    if (!empty($_POST["part_sime"])) {       
        $_SESSION['part_sime'] = 1;
    }
    else{
        $_SESSION['part_sime'] = 0;    
    }  


    if (!empty($_POST["part_valve_seats"])) {
        $_SESSION['part_valve_seats'] = 1;  
    } 
    else{
        $_SESSION['part_valve_seats'] = 0;    
    }
    header("Location:order.php?step=3");
  }


?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?step=2" method='POST'>
            <div class='data_text'>
                <label for="part_valve">Zawory:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_valve'])){
                  echo "checked";}?> name="part_valve" id="part_valve">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_sealant">Uszczelniacze:</label>

                <input type="checkbox" <?php if(!empty($_SESSION['part_sealant'])){
                  echo "checked";}?> name="part_sealant" id="part_sealant">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_pusher">Popychacze:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_pusher'])){
                 echo "checked";}?> name="part_pusher" id="part_pusher">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_fence">Prowadnice:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_fence'])){
                  echo "checked";}?> name="part_fence" id="part_fence">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_valve_seats">Gniazda zaworowe:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_valve_seats'])){
                  echo "checked";}?> name="part_valve_seats" id="part_valve_seats">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_vortex">Komory wirowe:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_vortex'])){
                  echo "checked";}?> name="part_vortex" id="part_vortex">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="part_sime">Simeringi:</label>
                <input type="checkbox" <?php if(!empty($_SESSION['part_sime'])){
                  echo "checked";}?> name="part_sime" id="part_sime">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <input type="submit" value="Następny krok">
            </div>
        </form>
    </div>
</div>