<div class='number'><span>1</span></div>
<h2>Krok pierwszy </h2>
<span>Wypełnij formularz danymi swojej głowicy</span>
</div>
<div id="form">
    <div id="data">

        <?php
// define variables and set to empty values

$mark = $model = $year = $capacity = $fuel = $eng_num = $valve = $type = "";

$GLOBALS['check']= 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["mark"])) {
      $_SESSION['markErr'] = "Marka jest wymagane";
      $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
    } 
     
    else {
      $mark = test_input($_POST["mark"]);
      // $GLOBALS['check'] if name only contains letters and whitespace
      if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s ]*$/u",$mark)) {
        $_SESSION['markErr'] = "Dozwolone są tylko litery";
        $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
      }
      else{
        $_SESSION['mark'] = $_POST["mark"];
        $GLOBALS['check'] = 1;
        $_SESSION['markErr'] = "";
      }
    }

    if (empty($_POST["model"])) {
        $_SESSION['modelErr'] = "Model jest wymagane";
        $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
    } 
    else {
        $model = test_input($_POST["model"]);
        // $GLOBALS['check'] if e-mail address is well-formed
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ0-9\s ]*$/u",$model)) {
          $_SESSION['modelErr'] = "Dozwolone są tylko litery i cyfry";
          $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
        }
        else{
          $_SESSION['model'] = $_POST["model"];
          $GLOBALS['check'] = 1;
          $_SESSION['modelErr'] = "";
        }
    }

    if (empty($_POST["year"])) {
        $_SESSION['yearErr'] = "Rok produkcji jest wymagany";
        $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
    } 
    else {
        $year = test_input($_POST["year"]);
        // $GLOBALS['check'] if e-mail address is well-formed
        if (!preg_match("/^[0-9]*$/",$year)) {
          $_SESSION['yearErr'] = "Dozwolone są tylko liczby";
          $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
        }
        else{
          $_SESSION['year'] = $_POST["year"];
          $GLOBALS['check'] = 1;
          $_SESSION['yearErr'] = "";
        }
    }

    if (empty($_POST["capacity"])) {
      $_SESSION['capacityErr'] = "Rok produkcji jest wymagany";
      $GLOBALS['check'] = false;
    header("Location:order.php");
    exit;
  } 
  else {
      $capacity = test_input($_POST["capacity"]);
      // $GLOBALS['check'] if e-mail address is well-formed
      if (!preg_match("/^[0-9][,.][0-9]*$/",$capacity)) {
        $_SESSION['capacityErr'] = "Dozwolone są tylko liczby";
        $GLOBALS['check'] = false;
    header("Location:order.php");
    exit;
      }
      else{
        $_SESSION['capacity'] = $_POST["capacity"];
        $GLOBALS['check'] = 1;
        $_SESSION['capacityErr'] = "";
      }
  }

    if (empty($_POST["fuel"])) {
        $_SESSION['fuelErr'] = "Rodzaj paliwa jest wymagany";
        $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
    }
    else{
      $_SESSION['fuel'] = $_POST["fuel"];
      $GLOBALS['check'] = 1;
      $_SESSION['fuelErr'] = "";
    } 
      
    if (!empty($_POST["eng_num"])) {       
        $eng_num = test_input($_POST["eng_num"]);
        // $GLOBALS['check'] if e-mail address is well-formed
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9]*$/u",$eng_num)) {
          $_SESSION['eng_numErr'] = "Dozwolone są tylko litery i liczby";
          $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
        }
        else{
          $_SESSION['eng_num'] =$_POST["eng_num"];
          $GLOBALS['check'] = 1;
          $_SESSION['eng_numErr'] = "";         
        }
    }

    if (empty($_POST["valve"])) {
        $_SESSION['valveErr'] = "Ilość zaworów jest wymagana";
        $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
      } 
    else {
        $valve = test_input($_POST["valve"]);
        // $GLOBALS['check'] if e-mail address is well-formed
        if (!preg_match("/^[0-9]*$/",$valve)) {
          $_SESSION['valveErr'] = "Dozwolone są tylko liczby";
          $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
        }
        else{
          $_SESSION['valve'] = $_POST["valve"];
          $GLOBALS['check'] = 1;
          $_SESSION['valveErr'] = "";
        }
    }
    if (empty($_POST["type"])) {
      $_SESSION['typeErr'] = "Typ silnika jest wymagany";
      $GLOBALS['check'] = false;
      header("Location:order.php");
      exit;
    }
    else{
      $_SESSION['type'] = $_POST["type"];
      $GLOBALS['check'] = 1;
      $_SESSION['typeErr'] = "";
    } 

  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($GLOBALS['check'] == 1){
  header("Location:order.php?step=2");
}
?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>
            <div class='data_text'>
                <label for="mark">Marka auta:</label>
                <div class="error"><span><?php if(isset($_SESSION['markErr'])){ echo $_SESSION['markErr'];}?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['mark'])){
                  echo "value='" . $_SESSION['mark'] . "'";}?> name="mark" id="mark">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="model">Model:</label>
                <div class="error"><span><?php if(isset($_SESSION['modelErr'])){ echo $_SESSION['modelErr'];}?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['model'])){
                  echo "value='" . $_SESSION['model'] . "'";}?> name="model" id="model">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="year">Rok produkcji:</label>
                <div class="error"><span><?php if(isset($_SESSION['yearErr'])){ echo $_SESSION['yearErr'];}?></span>
                </div>
                <input type="number" <?php if(!empty($_SESSION['year'])){
                  echo "value='" . $_SESSION['year'] . "'";}?> name="year" id="year">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="capacity">Pojemność:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['capacityErr'])){ echo $_SESSION['capacityErr'];}?></span></div>
                <input type="text" <?php if(!empty($_SESSION['capacity'])){
                  echo "value='" . $_SESSION['capacity'] . "'";}?> name="capacity" id="capacity">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="valve">Ilość zaworów:</label>
                <div class="error"><span><?php if(isset($_SESSION['valveErr'])){ echo $_SESSION['valveErr'];}?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['valve'])){
                  echo "value='" . $_SESSION['valve'] . "'";}?> name="valve" id="valve">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="fuel">Rodzaj paliwa:</label>
                <div class="error"><span><?php if(isset($_SESSION['fuelErr'])){ echo $_SESSION['fuelErr'];}?></span>
                </div>
                <select type="text" <?php if(!empty($_SESSION['fuel'])){
                  echo "value='" . $_SESSION['fuel'] . "'";}?> name="fuel" id="fuel">
                    <option value="">--</option>
                    <option value="Benzyna">Benzyna</option>
                    <option value="Diseal">Diseal</option>
                    <option value="Gaz">LPG</option>
                </select>
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="eng_num">Numer silnika:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['eng_numErr'])){ echo $_SESSION['eng_numErr'];}?></span></div>
                <input type="text" <?php if(!empty($_SESSION['eng_num'])){
                  echo "value='" . $_SESSION['eng_num'] . "'";}?> name="eng_num" id="eng_num">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="type">Typ silnika:</label>
                <div class="error"><span><?php if(isset($_SESSION['typeErr'])){ echo $_SESSION['typeErr'];}?></span>
                </div>
                <select type="text" onchange="Eng_change()" <?php if(!empty($_SESSION['type'])){
                    echo "value='" . $_SESSION['type'] . "'";}?> name="type" id="type">
                   <option value="">--</option>
                   <option value="row_eng">Silnik rzędowy</option>
                   <option value="v_eng">Silnik typu V</option>
                   <option value="w_eng">Silnik typu W</option>
                   <option value="boxer_eng">Silnik typu boxer</option>
                </select>
            </div>
            <div style="clear:both"></div>
            <div class='data_text' id="quantity_id" style="display:none;" >
                <label for="quantity">Czy chcesz naprawić obie głowice?</label>
                <div class="error"><span><?php if(isset($_SESSION['typeErr'])){ echo $_SESSION['typeErr'];}?></span>
                </div>
                <input type="checkbox"  <?php if(!empty($_SESSION['quantity'])){
                    echo "value='" . $_SESSION['quantity'] . "'";}?> name="quantity" id="quantity">
                </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <input type="submit" value="Następny krok">
            </div>
        </form>
    </div>
</div>