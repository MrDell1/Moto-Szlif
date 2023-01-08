<div class="flex flex-col align-center items-center">
  <div class='my-2'><span class='rounded-full border-gray-400 border-2 px-2 py-2 font-semibold'>1</span></div>
  <h2>Krok pierwszy </h2>
  <span>Wypełnij formularz danymi swojej głowicy</span>
</div>
<div id="form">
  <div id="data">

    <?php
    // define variables and set to empty values

    $mark = $model = $year = $capacity = $fuel = $eng_num = $valve = $type = "";
    $markErr = $modelErr = $yearErr = $capacityErr = $fuelErr = $eng_numErr = $valveErr = $typeErr = "";

    $error = 1;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['head_data']) && $_GET['head_data'] == 'true') {
      if ($_POST['foo'] == 'Anuluj') {
        header("location: index.php");
      }
      if (empty($_POST["mark"])) {
        $markErr = "Marka jest wymagane";
        $error = 0;
      } else {
        $mark = test_input($_POST["mark"]);
        // $error if name only contains letters and whitespace
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s ]*$/u", $mark)) {
          $markErr = "Dozwolone są tylko litery";
          $error = 0;
        } else {
          $_SESSION['mark'] = $mark;

          $markErr = "";
        }
      }

      if (empty($_POST["model"])) {
        $modelErr = "Model jest wymagane";
        $error = 0;
      } else {
        $model = test_input($_POST["model"]);
        // $error if e-mail address is well-formed
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ0-9\s ]*$/u", $model)) {
          $modelErr = "Dozwolone są tylko litery i cyfry";
          $error = 0;
        } else {
          $_SESSION['model'] = $model;

          $modelErr = "";
        }
      }

      if (empty($_POST["year"])) {
        $yearErr = "Rok produkcji jest wymagany";
        $error = 0;
      } else {
        $year = test_input($_POST["year"]);
        // $error if e-mail address is well-formed
        if (!preg_match("/^[0-9]*$/", $year)) {
          $yearErr = "Dozwolone są tylko liczby";
          $error = 0;
        } else {
          $_SESSION['year'] = $year;

          $yearErr = "";
        }
      }

      if (empty($_POST["capacity"])) {
        $capacityErr = "Rok produkcji jest wymagany";
        $error = 0;
      } else {
        $capacity = test_input($_POST["capacity"]);
        // $error if e-mail address is well-formed
        if (!preg_match("/^[0-9][,.][0-9]*$/", $capacity)) {
          $capacityErr = "Dozwolone są tylko liczby";
          $error = 0;
        } else {
          $_SESSION['capacity'] = $capacity;

          $capacityErr = "";
        }
      }

      if (empty($_POST["fuel"])) {
        $fuelErr = "Rodzaj paliwa jest wymagany";
        $error = 0;
      } else {
        $_SESSION['fuel'] = $_POST["fuel"];

        $fuelErr = "";
      }

      if (!empty($_POST["eng_num"])) {
        $eng_num = test_input($_POST["eng_num"]);
        // $error if e-mail address is well-formed
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9]*$/u", $eng_num)) {
          $eng_numErr = "Dozwolone są tylko litery i liczby";
          $error = 0;
        } else {
          $_SESSION['eng_num'] = $eng_num;

          $eng_numErr = "";
        }
      }

      if (empty($_POST["valve"])) {
        $valveErr = "Ilość zaworów jest wymagana";
        $error = 0;
      } else {
        $valve = test_input($_POST["valve"]);
        if (!preg_match("/^[0-9]*$/", $valve)) {
          $valveErr = "Dozwolone są tylko liczby";
          $error = 0;
        } else {
          $_SESSION['valve'] = $valve;
          $valveErr = "";
        }
      }
      if (empty($_POST["type"])) {
        $typeErr = "Typ silnika jest wymagany";
        $error = 0;
      } else {
        $_SESSION['type'] = $_POST["type"];
        $typeErr = "";
      }
      if ($error == 1) {
        $_SESSION['step'] = 2;
        header("location: order.php");
      }
    }



    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    <form class="flex flex-col gap-8 items-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?head_data=true" method='POST'>
      <div class="flex flex-row gap-10">
        <div class="flex flex-col gap-4">
          <div class='data_text'>
            <label for="mark">Marka auta:</label>
            <div class="error"><span><?php if (isset($markErr)) {
                                        echo $markErr;
                                      } ?></span>
            </div>
            <input type="text" <?php if (!empty($_SESSION['mark'])) {
                                  echo "value='" . $_SESSION['mark'] . "'";
                                } ?> name="mark" id="mark">
          </div>

          <div class='data_text'>
            <label for="model">Model:</label>
            <div class="error"><span><?php if (isset($modelErr)) {
                                        echo $modelErr;
                                      } ?></span>
            </div>
            <input type="text" <?php if (!empty($_SESSION['model'])) {
                                  echo "value='" . $_SESSION['model'] . "'";
                                } ?> name="model" id="model">
          </div>

          <div class='data_text'>
            <label for="year">Rok produkcji:</label>
            <div class="error"><span><?php if (isset($yearErr)) {
                                        echo $yearErr;
                                      } ?></span>
            </div>
            <input type="number" <?php if (!empty($_SESSION['year'])) {
                                    echo "value='" . $_SESSION['year'] . "'";
                                  } ?> name="year" id="year">
          </div>

          <div class='data_text'>
            <label for="capacity">Pojemność:</label>
            <div class="error">
              <span><?php if (isset($capacityErr)) {
                      echo $capacityErr;
                    } ?></span>
            </div>
            <input type="text" <?php if (!empty($_SESSION['capacity'])) {
                                  echo "value='" . $_SESSION['capacity'] . "'";
                                } ?> name="capacity" id="capacity">
          </div>
        </div>
        <div class="flex flex-col gap-4">

          <div class='data_text'>
            <label for="valve">Ilość zaworów:</label>
            <div class="error"><span><?php if (isset($valveErr)) {
                                        echo $valveErr;
                                      } ?></span>
            </div>
            <input type="text" <?php if (!empty($_SESSION['valve'])) {
                                  echo "value='" . $_SESSION['valve'] . "'";
                                } ?> name="valve" id="valve">
          </div>

          <div class='data_text'>
            <label for="fuel">Rodzaj paliwa:</label>
            <div class="error"><span><?php if (isset($fuelErr)) {
                                        echo $fuelErr;
                                      } ?></span>
            </div>
            <select type="text" <?php if (!empty($_SESSION['fuel'])) {
                                  echo "value='" . $_SESSION['fuel'] . "'";
                                } ?> name="fuel" id="fuel">
              <option value="">--</option>
              <option value="Benzyna">Benzyna</option>
              <option value="Diseal">Diseal</option>
              <option value="Gaz">LPG</option>
            </select>
          </div>

          <div class='data_text'>
            <label for="eng_num">Numer silnika:</label>
            <div class="error">
              <span><?php if (isset($eng_numErr)) {
                      echo $eng_numErr;
                    } ?></span>
            </div>
            <input type="text" <?php if (!empty($_SESSION['eng_num'])) {
                                  echo "value='" . $_SESSION['eng_num'] . "'";
                                } ?> name="eng_num" id="eng_num">
          </div>

          <div class='data_text'>
            <label for="type">Typ silnika:</label>
            <div class="error"><span><?php if (isset($typeErr)) {
                                        echo $typeErr;
                                      } ?></span>
            </div>
            <select type="text" onchange="Eng_change()" <?php if (!empty($_SESSION['type'])) {
                                                          echo "value='" . $_SESSION['type'] . "'";
                                                        } ?> name="type" id="type">
              <option value="">--</option>
              <option value="row_eng">Silnik rzędowy</option>
              <option value="v_eng">Silnik typu V</option>
              <option value="w_eng">Silnik typu W</option>
              <option value="boxer_eng">Silnik typu boxer</option>
            </select>
          </div>

          <div class='data_text' id="quantity_id" style="display:none;">
            <label for="quantity">Czy chcesz naprawić obie głowice?</label>
            <div class="error"><span><?php if (isset($typeErr)) {
                                        echo $typeErr;
                                      } ?></span>
            </div>
            <input type="checkbox" <?php if (!empty($_SESSION['quantity'])) {
                                      echo "value='" . $_SESSION['quantity'] . "'";
                                    } ?> name="quantity" id="quantity">
          </div>
        </div>
      </div>

      <div class='flex flex-row gap-4 w-full'>
        <input type="submit" class="hover:bg-[#3801ff] bg-[#c70f0f] w-full text-white rounded-md border-color-[#d1d5db] h-10 border-[1px]" value="Anuluj" name="foo" />
        <input class="w-full rounded-md border-color-[#d1d5db] h-10 border-[1px]" type="submit" value="Następny krok" name="foo" />
      </div>
    </form>
  </div>
</div>