<?php
// define variables and set to empty values

$username = $fname = $email = $lname = "";
$tel_number = $country = $state = $city = $address = $code = "";

$tel_numberErr = $countryErr = $stateErr = $cityErr = $addressErr = $codeErr = "";
$usernameErr = $fnameErr = $emailErr = $lnameErr = "";

$company = $nip = "";
$companyErr = $nipErr = "";
$error = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['data']) && $_GET['data'] == 'true') {
  if ($_POST['foo'] == 'Wstecz') {
    $_SESSION['step'] = 3;
    header("location: order.php");
    exit();
  }
  if (empty($_POST["fname"])) {
    $fnameErr = "Imię jest wymagane";
    $error = 1;
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $fname)) {
      $fnameErr = "Dozwolone są tylko litery";
      $error = 1;
    } else {
      $fnameErr = "";
      $_SESSION['fname'] = $fname;
    }
  }

  if (empty($_POST["email"])) {
    $emailErr  = "Email jest wymagany";
    $error = 1;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Zły format adresu email";
      $error = 1;
    } else {
      $emailErr = "";
      $_SESSION['email'] = $email;
    }
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "Nazwisko jest wymagane";
    $error = 1;
  } else {
    $lname = test_input($_POST["lname"]);
    if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $lname)) {
      $lnameErr = "Dozwolone są tylko litery";
      $error = 1;
    } else {
      $lnameErr = "";
      $_SESSION['lname'] = $lname;
    }
  }


  if (empty($_POST["tel_number"])) {
    $tel_numberErr = "Numer telefonu jest wymagany";
    $error = 1;
  } else {
    $tel_number = test_input($_POST["tel_number"]);
    if (!preg_match("/^[0-9]*$/", $tel_number)) {
      $tel_numberErr = "Dozwolone są tylko liczby";
      $error = 1;
    } else {
      $tel_numberErr = "";
      $_SESSION['tel_number'] = $tel_number;
    }
  }

  if (empty($_POST["country"])) {
    $countryErr = "Kraj jest wymagany";
    $error = 1;
  } else {
    $country = $_POST["country"];
    $countryErr = "";
    $_SESSION['country'] = $country;
  }

  if (empty($_POST["state"])) {
    $stateErr = "Województwo jest wymagane";
    $error = 1;
  } else {
    $state = $_POST["state"];
    $stateErr = "";
    $_SESSION['state'] = $state;
  }

  if (empty($_POST["city"])) {
    $cityErr = "Miasto jest wymagane";
    $error = 1;
  } else {
    $city = test_input($_POST["city"]);
    if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u", $city)) {
      $cityErr = "Dozwolone są tylko litery";
      $error = 1;
    } else {
      $city = $city;
      $cityErr = "";
      $_SESSION['city'] = $city;
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "Adres jest wymagany";
    $error = 1;
  } else {
    $address = test_input($_POST["address"]);
    if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9]*$/u", $address)) {
      $addressErr = "Dozwolone są tylko litery i liczby";
      $error = 1;
    } else {
      $address = $address;
      $_SESSION['address'] = $address;
      $addressErr = "";
    }
  }

  if (empty($_POST["code"])) {
    $codeErr = "Kod pocztowy jest wymagany";
    $error = 1;
  } else {
    $code = test_input($_POST["code"]);
    if (!preg_match("/^[0-9-{1}]*$/", $code)) {
      $codeErr = "Dozwolone są tylko liczby";
      $error = 1;
    } else {
      $code = $code;
      $_SESSION['code'] = $code;
      $codeErr = "";
    }
  }
  if (empty($_POST["company"])) {
    if (isset($company)) {
      unset($company);
    }
  } else {
    $company = test_input($_POST["company"]);
    if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u", $company)) {
      $companyErr = "Dozwolone są tylko liczby i litery";
      $error = 1;
    } else {
      $company = $company;
      $companyErr = "";
      $_SESSION['company'] = $company;
    }
  }

  if (empty($_POST["nip"])) {
    if (isset($nip)) {
      unset($nip);
    }
  } else {
    $nip = test_input($_POST["nip"]);
    if (!preg_match("/^[[0-9-{1}]*$/u", $nip)) {
      $nipErr = "Dozwolone są tylko liczby";
      $error = 1;
    } else {
      $nip = $nip;
      $nipErr = "";
      $_SESSION['nip'] = $nip;
    }
  }
  if ($error == 1) {
    $_SESSION['step'] = 5;
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





function input_container($err, $label, $session_name, $id)
{
  echo "<div class='data_text'>";
  echo    "<label for='" . $id . "'>" . $label . "</label>";
  echo    "<span class='error'>";
  if (isset($err)) {
    echo $err;
  }
  echo    "</span>";
  echo    " <input type='text' name='" . $id . "' id='" . $id . "' ";
  if (!empty($session_name)) {
    echo "value='" . $session_name . "'";
  }
  echo    " > </div>";
}

function select_container($err, $label, $session_name, $id)
{
  echo "<div class='data_text'>";
  echo    "<label for='" . $id . "'>" . $label . "</label>";
  echo    "<span class='error'>";
  if (isset($err)) {
    echo $err;
  }
  echo    "</span>";
  echo    " <select name='" . $id . "' id='" . $id . "' ";
  if (!empty($session_name)) {
    echo "value='" . $session_name . "'";
  }
  echo    ">";
  if ($label == "Kraj:") {
    include('countrySelect.php');
  } else {
    include('provinceSelect.php');
  }
  echo "  </select></div>";
}



?>
<div class="flex flex-col align-center items-center">

  <div class='my-2'>
    <span class='rounded-full border-gray-400 border-2 px-2 py-2 font-semibold'>4</span>
  </div>
  <h2>Krok czwarty </h2>
  <span class="text-center">Wypełnij formularz swoimi danymi. <br> Jeśli chcesz otrzymąć fakturę wypełnij "Dane do faktury".</span>
</div>
<div id="form">
  <div id="data">
    <form class="flex flex-col gap-8 items-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?data=true" method='POST'>
      <div class="flex flex-row gap-10">
        <div class="flex flex-col gap-4">
          <?php input_container($fnameErr, "Imię:", $_SESSION['fname'], "fname") ?>
          <?php input_container($lnameErr, "Nazwisko:", $_SESSION['lname'], "lname") ?>
          <?php input_container($emailErr, "E-mail:", $_SESSION['email'], "email") ?>
          <?php input_container($tel_numberErr, "Numer telefonu:", $_SESSION['tel_number'], "tel_number") ?>
          <?php input_container($cityErr, "Miasto:", $_SESSION['city'], "city") ?>
          <?php input_container($addressErr, "Adres:", $_SESSION['address'], "address") ?>
          <?php input_container($codeErr, "Kod pocztowy:", $_SESSION['code'], "code") ?>
          <?php select_container($countryErr, "Kraj:", $_SESSION['country'], "country") ?>
          <?php select_container($stateErr, "Województwo:", $_SESSION['state'], "state") ?>
        </div>
        <div class="flex flex-col gap-4">
          <div class='services_text'>
            <label onclick='toggleInvoice("isInvoice")' for="isInvoice">Chce otrzymać fakture vat</label>
            <input onclick='toggleInvoice("isInvoice")' type='checkbox' name="isInvoice">
          </div>
          <div class="hidden flex-col gap-4" id="isInvoice">
            <?php input_container($companyErr, "Firma:", $company, "company") ?>
            <?php input_container($nipErr, "NIP:", $nip, "nip") ?>
          </div>

        </div>
      </div>
      <div class='flex flex-row gap-4 w-full'>
        <input type="submit" class="hover:bg-[#3801ff] bg-[#c70f0f] w-full text-white rounded-md border-color-[#d1d5db] h-10 border-[1px]" value="Wstecz" name="foo" />
        <input class="w-full rounded-md border-color-[#d1d5db] h-10 border-[1px]" type="submit" value="Następny krok" name="foo" />
      </div>
    </form>
  </div>
</div>