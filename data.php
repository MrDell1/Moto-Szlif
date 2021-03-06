<div class='number'><span>4</span></div>
<h2>Krok czwarty </h2>
<span>Wypełnij formularz swoimi danymi. <br> Jeśli chcesz otrzymąć fakturę wypełnij "Dane do faktury".</span>
</div>
<div id="form" style="max-width:900px;">
    <div id="data">
        <?php
// define variables and set to empty values

$fname = $email = $lname = $tel_number = $country = $state = $city = $address = $code = $company = $nip = "";


$GLOBALS['check']= 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $_SESSION['fnameErr'] = "Imię jest wymagane";
      $GLOBALS['check'] = false;
      header("Location:order.php?step=4");
      exit;
    } 
    else {
      $fname = test_input($_POST["fname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u",$fname)) {
        $_SESSION['fnameErr'] = "Dozwolone są tylko litery";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;        
      }
      else{
        $_SESSION['fname'] = $fname;
        $GLOBALS['check']= 1;
        $_SESSION['fnameErr']="";
      }
    }

    if (empty($_POST["email"])) {
        $_SESSION['emailErr']  = "Email jest wymagany";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
    } 
    else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $_SESSION['emailErr'] = "Zły format adresu email";
          $GLOBALS['check'] = false;
          header("Location:order.php?step=4");
          exit;
        }
        else{
          $_SESSION['email'] = $email;
          $GLOBALS['check']= 1;
          $_SESSION['emailErr'] = "";
        }
    }

    if (empty($_POST["lname"])) {
        $_SESSION['lnameErr'] = "Nazwisko jest wymagane";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
    } 
    else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u",$lname)) {
          $_SESSION['lnameErr'] = "Dozwolone są tylko litery";
          $GLOBALS['check'] = false;
          header("Location:order.php?step=4");
          exit;
        }
        else{
          $_SESSION['lname'] = $lname;
          $GLOBALS['check']= 1;
          $_SESSION['lnameErr'] = "";
        }
    }

    if (empty($_POST["tel_number"])) {
        $_SESSION['tel_numberErr'] = "Numer telefonu jest wymagany";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
    } 
    else {
        $tel_number = test_input($_POST["tel_number"]);
        if (!preg_match("/^[0-9]*$/",$tel_number)) {
          $_SESSION['tel_numberErr'] = "Dozwolone są tylko liczby";
          $GLOBALS['check'] = false;
          header("Location:order.php?step=4");
          exit;
        }
        else{
          $_SESSION['tel_number'] = $tel_number;
          $GLOBALS['check']= 1;
          $_SESSION['tel_numberErr'] = "";
        }
    }

    if (empty($_POST["country"])) {
        $_SESSION['countryErr'] = "Kraj jest wymagany";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
    }
    else{
      $_SESSION['country'] = $_POST["country"];
      $_SESSION['countryErr'] = "";  
    } 

    if (empty($_POST["state"])) {
        $_SESSION['stateErr'] = "Województwo jest wymagane";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
    }
    else{
      $_SESSION['state'] = $_POST["state"];
      $GLOBALS['check']= 1;    
      $_SESSION['stateErr'] = "";  
    } 
      
    if (empty($_POST["city"])) {
        $_SESSION['cityErr'] = "Miasto jest wymagane";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
    } 
    else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ ]*$/u",$city)) {
          $_SESSION['cityErr'] = "Dozwolone są tylko litery";
          $GLOBALS['check'] = false;
          header("Location:order.php?step=4");
          exit;
        }
        else{
          $_SESSION['city'] = $city;
          $GLOBALS['check']= 1;
          $_SESSION['cityErr'] = "";  
        }
    }

    if (empty($_POST["address"])) {
        $_SESSION['addressErr'] = "Adres jest wymagany";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
      }
    else {
        $address = test_input($_POST["address"]);
        if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9]*$/u",$address)) {
          $_SESSION['addressErr'] = "Dozwolone są tylko litery i liczby";
          $GLOBALS['check'] = false;
          header("Location:order.php?step=4");
          exit;
        }
        else{
          $_SESSION['address'] = $address;
          $GLOBALS['check']= 1; 
          $_SESSION['addressErr'] = "";          
        }
    }

    if (empty($_POST["code"])) {
        $_SESSION['codeErr'] = "Kod pocztowy jest wymagany";
        $GLOBALS['check'] = false;
        header("Location:order.php?step=4");
        exit;
      } 
    else {
        $code = test_input($_POST["code"]);
        if (!preg_match("/^[0-9-{1}]*$/",$code)) {
          $_SESSION['codeErr'] = "Dozwolone są tylko liczby";
          $GLOBALS['check'] = false;
          header("Location:order.php?step=4");
          exit;          
        }
        else{
          $_SESSION['code'] = $code;
          $GLOBALS['check']= 1;
          $_SESSION['codeErr'] = "";          
        }
      }
        if (empty($_POST["company"])) {
          if(isset($_SESSION['company'])){
            unset($_SESSION['company']);
          }
        }
      else {
          $company = test_input($_POST["company"]);
          if (!preg_match("/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŻŹ\s0-9\S]*$/u",$company)) {
            $_SESSION['companyErr'] = "Dozwolone są tylko liczby i litery";
            $GLOBALS['check'] = false;
            header("Location:order.php?step=4");
            exit;          
          }
          else{
            $_SESSION['company'] = $company;
            $GLOBALS['check']= 1;
            $_SESSION['companyErr'] = "";          
          }
        }

        if (empty($_POST["nip"])) {
          if(isset($_SESSION['nip'])){
            unset($_SESSION['nip']);
          }
        }
      else {
          $nip = test_input($_POST["nip"]);
          if (!preg_match("/^[[0-9-{1}]*$/u",$nip)) {
            $_SESSION['nipErr'] = "Dozwolone są tylko liczby";
            $GLOBALS['check'] = false;
            header("Location:order.php?step=4");
            exit;          
          }
          else{
            $_SESSION['nip'] = $nip;
            $GLOBALS['check']= 1;
            $_SESSION['nipErr'] = "";          
          }
        }
    
}
    
 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($GLOBALS['check'] === 1){
  header("Location:order.php?step=5");
}


?>




        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?step=4" method='POST'>
            <div class='data_text'>
                <label for="fname">Imię:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['fnameErr'])){echo $_SESSION['fnameErr']; }?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['fname'])){echo "value='" . $_SESSION['fname'] . "'";}?>
                    name="fname" id="fname">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="lname">Nazwisko:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['lnameErr'])){echo $_SESSION['lnameErr']; } ?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['lname'])){
                echo "value='" . $_SESSION['lname'] . "'";}
                ?> name="lname" id="lname">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="email">E-mail:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['emailErr'])){echo $_SESSION['emailErr']; }?></span>
                </div>
                <input type="email" <?php if(!empty($_SESSION['email'])){
                echo "value='" . $_SESSION['email'] . "'";}
                ?> name="email" id="email">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="tel_number">Numer telefonu:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['tel_numberErr'])){echo $_SESSION['tel_numberErr']; } ?></span>
                </div>
                <input type="tel" <?php if(!empty($_SESSION['tel_number'])){
                echo "value='" . $_SESSION['tel_number'] . "'";}
                ?> name="tel_number" id="tel_number">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="country">Kraj:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['countryErr'])){echo $_SESSION['countryErr']; } ?></span>
                </div>
                <select <?php if(!empty($_SESSION['country'])){
                echo "value='" . $_SESSION['country'] . "'";}
                ?> name="country" id="country">
                    <option value="">--</option>
                    <!---->
                    <option value="Andora"> Andora </option>
                    <option value="AE"> Zjednoczone Emiraty Arabskie </option>
                    <option value="Afganistan"> Afganistan </option>
                    <option value="AG"> Antigua i Barbuda </option>
                    <option value="Anguilla"> Anguilla </option>
                    <option value="Albania"> Albania </option>
                    <option value="Armenia"> Armenia </option>
                    <option value="AN"> Antyle Holenderskie </option>
                    <option value="Angola"> Angola </option>
                    <option value="Argentyna"> Argentyna </option>
                    <option value="AS"> Samoa Amerykańska </option>
                    <option value="Austria"> Austria </option>
                    <option value="Australia"> Australia </option>
                    <option value="Aruba"> Aruba </option>
                    <option value="AZ"> Republika Azerbejdżanu </option>
                    <option value="BA"> Bośnia i Hercegowina </option>
                    <option value="Barbados"> Barbados </option>
                    <option value="Bangladesz"> Bangladesz </option>
                    <option value="BE"> Belgia </option>
                    <option value="BF"> Burkina Faso </option>
                    <option value="BG"> Bułgaria </option>
                    <option value="BH"> Bahrajn </option>
                    <option value="BI"> Burundi </option>
                    <option value="BJ"> Benin </option>
                    <option value="BM"> Bermuda </option>
                    <option value="BN"> Brunei </option>
                    <option value="BO"> Boliwia </option>
                    <option value="BR"> Brazylia </option>
                    <option value="BS"> Bahamy </option>
                    <option value="BT"> Bhutan </option>
                    <option value="BW"> Botswana </option>
                    <option value="BY"> Białoruś </option>
                    <option value="BZ"> Belize </option>
                    <option value="CA"> Kanada </option>
                    <option value="CD"> Kongo, Demokratyczna Republika </option>
                    <option value="CF"> Republika Środkowoafrykańska </option>
                    <option value="CG"> Kongo, Republika </option>
                    <option value="CH"> Szwajcaria </option>
                    <option value="CI"> Wybrzeże Kości Słoniowej </option>
                    <option value="CK"> Wyspy Cooka </option>
                    <option value="CL"> Chile </option>
                    <option value="CM"> Kamerun </option>
                    <option value="CN"> Chiny </option>
                    <option value="CO"> Kolumbia </option>
                    <option value="CR"> Kostaryka </option>
                    <option value="CV"> Republika Zielonego Przylądka </option>
                    <option value="CY"> Cypr </option>
                    <option value="CZ"> Czechy </option>
                    <option value="DE"> Niemcy </option>
                    <option value="DJ"> Dżibuti </option>
                    <option value="DK"> Dania </option>
                    <option value="DM"> Dominika </option>
                    <option value="DO"> Dominikana </option>
                    <option value="DZ"> Algeria </option>
                    <option value="EC"> Ekwador </option>
                    <option value="EE"> Estonia </option>
                    <option value="EG"> Egipt </option>
                    <option value="EH"> Sahara Zachodnia </option>
                    <option value="ER"> Erytrea </option>
                    <option value="ES"> Hiszpania </option>
                    <option value="ET"> Etiopia </option>
                    <option value="FI"> Finlandia </option>
                    <option value="FJ"> Fidżi </option>
                    <option value="FK"> Falklandy </option>
                    <option value="FM"> Mikronezja </option>
                    <option value="FR"> Francja </option>
                    <option value="GA"> Republika Gabonu </option>
                    <option value="GB"> Wielka Brytania </option>
                    <option value="GD"> Grenada </option>
                    <option value="GE"> Gruzja </option>
                    <option value="GF"> Gujana Francuska </option>
                    <option value="GG"> Guernsey </option>
                    <option value="GH"> Ghana </option>
                    <option value="GI"> Gibraltar </option>
                    <option value="GL"> Grenlandia </option>
                    <option value="GM"> Gambia </option>
                    <option value="GN"> Gwinea </option>
                    <option value="GP"> Gwadelupa </option>
                    <option value="GQ"> Gwinea Równikowa </option>
                    <option value="GR"> Grecja </option>
                    <option value="GT"> Gwatemala </option>
                    <option value="GU"> Guam </option>
                    <option value="GW"> Gwinea Bissau </option>
                    <option value="GY"> Gujana </option>
                    <option value="HK"> Hong Kong </option>
                    <option value="HN"> Honduras </option>
                    <option value="HR"> Chorwacja </option>
                    <option value="HT"> Haiti </option>
                    <option value="HU"> Węgry </option>
                    <option value="ID"> Indonezja </option>
                    <option value="IE"> Irlandia </option>
                    <option value="IL"> Izrael </option>
                    <option value="IN"> Indie </option>
                    <option value="IQ"> Irak </option>
                    <option value="IR"> Iran </option>
                    <option value="IS"> Islandia </option>
                    <option value="IT"> Włochy </option>
                    <option value="JE"> Jersey </option>
                    <option value="JM"> Jamajka </option>
                    <option value="JO"> Jordan </option>
                    <option value="JP"> Japonia </option>
                    <option value="KE"> Kenia </option>
                    <option value="KG"> Kirgistan </option>
                    <option value="KH"> Kambodża </option>
                    <option value="KI"> Kiribati </option>
                    <option value="KM"> Komory </option>
                    <option value="KN"> Saint Kitts i Nevis </option>
                    <option value="KR"> Korea Południowa </option>
                    <option value="KW"> Kuwejt </option>
                    <option value="KY"> Kajmany </option>
                    <option value="KZ"> Kazachstan </option>
                    <option value="LA"> Laos </option>
                    <option value="LC"> Saint Lucia </option>
                    <option value="LI"> Liechtenstein </option>
                    <option value="LK"> Sri Lanka </option>
                    <option value="LT"> Litwa </option>
                    <option value="LU"> Luksemburg </option>
                    <option value="LV"> Łotwa </option>
                    <option value="LY"> Liban </option>
                    <option value="MA"> Maroko </option>
                    <option value="MC"> Monako </option>
                    <option value="MD"> Mołdawia </option>
                    <option value="ME"> Czarnogóra </option>
                    <option value="MG"> Madagaskar </option>
                    <option value="MH"> Wyspy Marshalla </option>
                    <option value="MK"> Macedonia </option>
                    <option value="ML"> Mali </option>
                    <option value="MM"> Birma </option>
                    <option value="MN"> Mongolia </option>
                    <option value="MO"> Makau </option>
                    <option value="MQ"> Martynika </option>
                    <option value="MR"> Mauretania </option>
                    <option value="MS"> Montserrat </option>
                    <option value="MT"> Malta </option>
                    <option value="MU"> Mauritius </option>
                    <option value="MV"> Malediwy </option>
                    <option value="MW"> Malawi </option>
                    <option value="MX"> Meksyk </option>
                    <option value="MY"> Malezja </option>
                    <option value="MZ"> Mozambik </option>
                    <option value="NA"> Namibia </option>
                    <option value="NC"> Nowa Kaledonia </option>
                    <option value="NE"> Niger </option>
                    <option value="NG"> Nigeria </option>
                    <option value="NI"> Nikaragua </option>
                    <option value="NL"> Holandia </option>
                    <option value="NO"> Norwegia </option>
                    <option value="NP"> Nepal </option>
                    <option value="NR"> Nauru </option>
                    <option value="NU"> Niue </option>
                    <option value="NZ"> Nowa Zelandia </option>
                    <option value="OM"> Oman </option>
                    <option value="PA"> Panama </option>
                    <option value="PE"> Peru </option>
                    <option value="PF"> Polinezja Francuska </option>
                    <option value="PG"> Papua-Nowa Gwinea </option>
                    <option value="PH"> Filipiny </option>
                    <option value="PK"> Pakistan </option>
                    <option selected value="Polska"> Polska </option>
                    <option value="PM"> Saint-Pierre i Miquelon </option>
                    <option value="PR"> Portoryko </option>
                    <option value="PT"> Portugalia </option>
                    <option value="PW"> Palau </option>
                    <option value="PY"> Paragwaj </option>
                    <option value="QA"> Katar </option>
                    <option value="RO"> Rumunia </option>
                    <option value="RS"> Serbia </option>
                    <option value="RU"> Rosja </option>
                    <option value="RW"> Rwanda </option>
                    <option value="SA"> Arabia Saudyjska </option>
                    <option value="SB"> Wyspy Salomona </option>
                    <option value="SC"> Seszele </option>
                    <option value="SE"> Szwecja </option>
                    <option value="SG"> Singapur </option>
                    <option value="SH"> Wyspa Świętej Heleny </option>
                    <option value="SI"> Słowenia </option>
                    <option value="SJ"> Svalbard </option>
                    <option value="SK"> Słowacja </option>
                    <option value="SL"> Sierra Leone </option>
                    <option value="SM"> San Marino </option>
                    <option value="SN"> Senegal </option>
                    <option value="SO"> Somalia </option>
                    <option value="SR"> Surinam </option>
                    <option value="SV"> Salwador </option>
                    <option value="SY"> Syria </option>
                    <option value="SZ"> Suazi </option>
                    <option value="TC"> Turks i Caicos </option>
                    <option value="TD"> Czad </option>
                    <option value="TG"> Togo </option>
                    <option value="TH"> Tajlandia </option>
                    <option value="TJ"> Tadżykistan </option>
                    <option value="TM"> Turkmenistan </option>
                    <option value="TN"> Tunezja </option>
                    <option value="TO"> Tonga </option>
                    <option value="TR"> Turcja </option>
                    <option value="TT"> Trynidad i Tobago </option>
                    <option value="TV"> Tuvalu </option>
                    <option value="TW"> Tajwan </option>
                    <option value="TZ"> Tanzania </option>
                    <option value="UA"> Ukraina </option>
                    <option value="UG"> Uganda </option>
                    <option value="US"> Stany Zjednoczone </option>
                    <option value="UY"> Urugwaj </option>
                    <option value="UZ"> Uzbekistan </option>
                    <option value="VA"> Watykan </option>
                    <option value="VC"> Saint Vincent i Grenadyny </option>
                    <option value="VE"> Wenezuela </option>
                    <option value="VG"> Brytyjskie Wyspy Dziewicze </option>
                    <option value="VI"> Wyspy Dziewicze (USA) </option>
                    <option value="VN"> Wietnam </option>
                    <option value="VU"> Vanuatu </option>
                    <option value="WF"> Wallis i Futuna </option>
                    <option value="WS"> Samoa Zachodnie </option>
                    <option value="YE"> Jemen </option>
                    <option value="YT"> Majotta </option>
                    <option value="ZA"> Republika Południowej Afryki </option>
                    <option value="ZM"> Zambia </option>
                    <option value="ZW"> Zimbabwe </option>
                </select>
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="state">Województwo:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['stateErr'])){echo $_SESSION['stateErr']; } ?></span>
                </div>
                <select <?php if(!empty($_SESSION['state'])){
                echo "value='" . $_SESSION['state'] . "'";}
                ?> name="state" id="state">
                    <option value="">--</option>
                    <option value="DOLNOŚLĄSKIE">DOLNOŚLĄSKIE</option>
                    <option value="KUJAWSKO-POMORSKIE">KUJAWSKO-POMORSKIE</option>
                    <option value="LUBELSKIE">LUBELSKIE</option>
                    <option value="LUBUSKIE">LUBUSKIE</option>
                    <option value="MAŁOPOLSKIE">MAŁOPOLSKIE</option>
                    <option value="MAZOWIECKIE">MAZOWIECKIE</option>
                    <option value="ŁÓDZKIE">ŁÓDZKIE</option>
                    <option value="OPOLSKIE">OPOLSKIE</option>
                    <option value="PODKARPACKIE">PODKARPACKIE</option>
                    <option value="PODLASKIE">PODLASKIE</option>
                    <option value="POMORSKIE">POMORSKIE</option>
                    <option value="ŚLĄSKIE">ŚLĄSKIE</option>
                    <option value="ŚWIĘTOKRZYSKIE">ŚWIĘTOKRZYSKIE</option>
                    <option value="WARMIŃSKO-MAZURSKIE">WARMIŃSKO-MAZURSKIE</option>
                    <option value="WIELKOPOLSKIE">WIELKOPOLSKIE</option>
                    <option value="ZACHODNIOPOMORSKIE">ZACHODNIOPOMORSKIE</option>
                </select>
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="city">Miasto:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['cityErr'])){echo $_SESSION['cityErr']; } ?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['city'])){
                echo "value='" . $_SESSION['city'] . "'";}
                ?> name="city" id="city">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="address">Adres:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['addressErr'])){echo $_SESSION['addressErr']; } ?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['address'])){
                echo "value='" . $_SESSION['address'] . "'";}
                ?> name="address" id="address">
            </div>
            <div style="clear:both"></div>
            <div class='data_text'>
                <label for="code">Kod pocztowy:</label>
                <div class="error">
                    <span><?php if(isset($_SESSION['codeErr'])){echo $_SESSION['codeErr']; }?></span>
                </div>
                <input type="text" <?php if(!empty($_SESSION['code'])){
                echo "value='" . $_SESSION['code'] . "'";}
                ?> name="code" id="code">
            </div>
            <div style="clear:both"></div>
            
    </div>
    <div style="float:left;">
        
            <span style="font-size:1vw; font-style:bold;">Dane do faktury: </span>
                  <br>
                  <br>
        <div class='data_text'>
            <label for="company">Firma:</label>
            <div class="error">
              <span><?php if(isset($_SESSION['companyErr'])){echo $_SESSION['companyErr']; }?></span>
            </div>
            <input type="text" <?php if(!empty($_SESSION['company'])){
                echo "value='" . $_SESSION['company'] . "'";}
                ?> name="company" id="company">
        </div>
        <div style="clear:both"></div>
        <div class='data_text'>
            <label for="nip">NIP:</label>
            <div class="error">
              <span><?php if(isset($_SESSION['nipErr'])){echo $_SESSION['nipErr']; }?></span>
            </div>
            <input type="text" <?php if(!empty($_SESSION['nip'])){
                echo "value='" . $_SESSION['nip'] . "'";}
                ?> name="nip" id="nip">
        </div>
        <div style="clear:both"></div>
            <div class='data_text' style="top:430px; position:relative;">
                <input type="submit" value="Następny krok">
            </div>
    </div>

    </form>

</div>
</div>


