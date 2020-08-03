<div class='number'><span>2</span></div><h2>Krok drugi </h2>
        <span>Wypełnij formularz danymi swojej głowicy</span>
    </div>
<div id="form">  
    <div id="data">

    <?php
// define variables and set to empty values
$markErr = $modelErr = $yearErr = $capacityErr = $fuelErr = $eng_numErr = $vin_numErr = "";

$mark = $model = $year = $capacity = $fuel = $eng_num = $vin_num = "";

$check = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["mark"])) {
      $markErr = "Marka jest wymagane";
      $check = false;
    } 
    else {
      $mark = test_input($_POST["mark"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s ]*$/u",$mark)) {
        $markErr = "Dozwolone są tylko litery";
        $check = false;
      }
      else{
        $_SESSION['mark'] = $mark;
        $check = true;
      }
    }

    if (empty($_POST["model"])) {
        $modelErr = "Model jest wymagane";
        $check = false;
    } 
    else {
        $model = test_input($_POST["model"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ0-9\s ]*$/u",$model)) {
          $modelErr = "Dozwolone są tylko litery i cyfry";
          $check = false;
        }
        else{
          $_SESSION['model'] = $model;
          $check = true;
        }
    }

    if (empty($_POST["year"])) {
        $yearErr = "Rok produkcji jest wymagany";
        $check = false;
    } 
    else {
        $year = test_input($_POST["year"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[0-9]*$/",$year)) {
          $yearErr = "Dozwolone są tylko liczby";
          $check = false;
        }
        else{
          $_SESSION['year'] = $year;
          $check = true;
        }
    }

    if (empty($_POST["fuel"])) {
        $fuelErr = "Rodzaj paliwa jest wymagany";
        $check = false;
    }
    else{
      $_SESSION['fuel'] = $fuel;
      $check = true;
    } 
      
    if (empty($_POST["eng_num"])) {
        $eng_numErr = "Adres jest wymagany";
        $check = false;
      }
    else {
        $eng_num = test_input($_POST["eng_num"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9]*$/u",$eng_num)) {
          $eng_numErr = "Dozwolone są tylko litery i liczby";
          $check = false;
        }
        else{
          $_SESSION['eng_num'] = $eng_num;
          $check = true;         
        }
    }

    if (empty($_POST["vin_num"])) {
        $vin_numErr = "Kod pocztowy jest wymagany";
        $check = false;
      } 
    else {
        $vin_num = test_input($_POST["vin_num"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[0-9-{1}]*$/",$vin_num)) {
          $vin_numErr = "Dozwolone są tylko liczby";
          $check = false;
        }
        else{
          $_SESSION['vin_num'] = $vin_num;
          $check = true;
        }
    }

  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($check == true){
  header("Location:order.php?step=2");
}
?>


            <form action="head_data_checker.php" method='POST'>
                <div class='data_text'>
                    <label for="mark">Marka auta:</label>
                    <div class="error"><span><?php echo $markErr;?></span></div>
                    <input type="text" <?php if(!empty($_SESSION['mark'])){
                  echo "value='" . $_SESSION['mark'] . "'";}?> name="mark" id="mark" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="model">Model:</label>
                    <div class="error"><span><?php echo $modelErr;?></span></div>
                    <input type="text" <?php if(!empty($_SESSION['model'])){
                  echo "value='" . $_SESSION['model'] . "'";}?> name="model" id="model" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="year">Rok produkcji:</label>
                    <div class="error"><span><?php echo $yearErr;?></span></div>
                    <input type="number" <?php if(!empty($_SESSION['year'])){
                  echo "value='" . $_SESSION['year'] . "'";}?> name="year" id="year" >
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="capacity">Pojemność:</label>
                    <div class="error"><span><?php echo $capacityErr;?></span></div>
                    <input type="number" <?php if(!empty($_SESSION['capacity'])){
                  echo "value='" . $_SESSION['capacity'] . "'";}?> name="capacity" id="capacity">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="fuel">Rodzaj paliwa:</label>
                    <div class="error"><span><?php echo $fuelErr;?></span></div>
                    <select type="text" <?php if(!empty($_SESSION['fuel'])){
                  echo "value='" . $_SESSION['fuel'] . "'";}?> name="fuel" id="fuel">
                        <option value="pb">Benzyna</option>
                        <option value="diseal">Diseal</option>
                        <option value="gaz">LPG</option>
                    </select>
                </div>          
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="eng_num">Numer silnika:</label>
                    <div class="error"><span><?php echo $eng_numErr;?></span></div>
                    <input type="text" <?php if(!empty($_SESSION['eng_num'])){
                  echo "value='" . $_SESSION['eng_num'] . "'";}?> name="eng_num" id="eng_num">
                </div>
                <div style="clear:both"></div>
                <iv class='data_text'>
                    <label for="vin_num">Numer VIN:</label>
                    <div class="error"><span><?php echo $vin_numErr;?></span></div>
                    <input type="text" <?php if(!empty($_SESSION['vin_num'])){
                  echo "value='" . $_SESSION['vin_num'] . "'";}?> name="vin_num" id="vin_num">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <input type="submit" value="Następny krok">
                </div>
            </form>
        </div>
</div>