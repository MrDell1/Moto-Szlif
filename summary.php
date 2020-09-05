<div class='number'><span>5</span></div><h2>Krok piąty</h2>
        <span>Sprawdź czy wszystko się zgadza w przeciwnym wypadku cofnij się</span>
    </div>
<div id="form" style="max-width:850px;">  
    <div id="data">

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                if($_POST['rules'] == 'on'){
                header("Location:order.php?step=6");
                $_SESSION['rulesErr']="";
                }
                else{
                    $_SESSION['rulesErr'] = "Akceptacja regulaminu jest wymagana";
                    header("Location:order.php?step=5");
                    exit;
                }
                if($_POST['privacy'] == 'on'){
                    header("Location:order.php?step=6");
                    $_SESSION['privacyErr']="";
                    }
                    else{
                        $_SESSION['privacyErr'] = "Akceptacja polityki prywatności jest wymagana";
                        header("Location:order.php?step=5");
                        exit;
                    }
              }
        ?>
        <?php 
                echo "<div class='data'>";
                echo "<div class='data_text'>";
                echo "<span class='summary'>Informacje o głowicy:</span>";
                echo "<br>";
                echo "<br>";
                echo "Marka: ";
                echo $_SESSION['mark'];
                echo "<br>";
                echo "Model: ";
                echo $_SESSION["model"];
                echo "<br>";
                echo "Rok produkcji: ";
                echo $_SESSION['year'];
                echo "<br>";
                echo "Pojemność: ";
                echo $_SESSION['capacity'];
                echo "<br>";
                echo "Rodzaj paliwa: ";
                echo $_SESSION['fuel'];
                echo "<br>";
                if(isset($_SESSION['eng_num'])){
                    echo "Numer silnika: ";
                    echo $_SESSION['eng_num'];
                    echo "<br>";
                };
                echo "Ilość zaworów: ";
                echo $_SESSION['valve']; 
                echo "<br>";
                echo "Typ silnika: ";
                if($_SESSION['type'] == "row_eng"){
                    echo "Silnik rzędowy";
                }
                else if($_SESSION['type'] == "v_eng"){
                    echo "Silnik typu V";
                }
                else if($_SESSION['type'] == "w_eng"){
                    echo "Silnik typu W";
                }
                else{
                    echo "Silnik typu boxer";
                };
                echo "<br>";
                echo "<br>";
                echo "</div>";
                echo "<div class='data_text'>";
                echo "<span class='summary'>Części:</span>";
                echo "<br>";
                echo "<br>";


                if(isset($_SESSION['parts_1'])){
                    echo "Zawory";
                    echo "<br>";
                    $_SESSION["services_8"] = "Wymiana zaworów";
                };                
                if(isset($_SESSION['parts_2'])){
                    echo "Uszczelniacze";
                    echo "<br>";
                    $_SESSION["services_14"] = "Wymiana uszczelniaczy";
                };                
                if(isset($_SESSION['parts_3'])){
                    echo "Popychacze";
                    echo "<br>";
                    $_SESSION["services_21"] = "Wymiana popychaczy";
                };                
                if(isset($_SESSION['parts_4'])){
                    echo "Prowadnice";
                    echo "<br>";
                    $_SESSION["services_9"] = "Wymiana prowadnic";
                };
                if(isset($_SESSION['parts_6'])){
                    echo "Komory wirowe";
                    echo "<br>";
                    $_SESSION["services_13"] = "Wymiana komór wirowych";
                };
                if(isset($_SESSION['parts_7'])){
                    echo "Simeringi";
                    echo "<br>";
                    $_SESSION["services_20"] = "Wymiana simeringów";
                };
                if(isset($_SESSION['parts_5']) ){
                    echo "Gnizada zaworowe";
                    echo "<br>";
                    $_SESSION["services_11"] = "Wymiana gniazd zaworowych";
                };
                echo "<br>";
                echo "<br>";
                echo "</div>";
                echo "<div class='data_text'>";
                echo "<span class='summary'>Usługi:</span>";
                echo "<br>";
                echo "<br>";

                
            $conn = mysqli_connect("localhost", 'root', '', 'm-s');
            if (mysqli_connect_errno()) {
                echo "Błąd połączenia nr: " . mysqli_connect_errno();
                echo "Opis błędu: " . mysqli_connect_error();
                exit();
            }

            $sql = "SELECT * FROM `services` ORDER BY `services`.`Name` ";
            $result = $conn->query($sql);        
           
            while($x = $result->fetch_assoc()){
                //print_r($x);
                $id = $x['Id'];                
                if(isset($_SESSION['services_'.$id])){
                    echo $_SESSION['services_'.$id];
                    echo "<br>";
                }
            }
            /*if($_SESSION['part_valve'] == 1){
                echo "Wymiana zaworów";
                echo "<br>";
            }                
            if($_SESSION['part_sealant'] == 1){
                echo "Wymiana uszczelniaczy";
                echo "<br>";
            }                
            if($_SESSION['part_pusher'] == 1);{
                echo "Wymiana popychaczy";
                echo "<br>";
            }                
            if($_SESSION['part_fence'] == 1){
                echo "Wymiana prowadnic";
                echo "<br>";
            }
            if($_SESSION['part_vortex'] == 1){
                echo "Wymiana komór wirowych";
                echo "<br>";
            }
            if($_SESSION['part_sime'] == 1){
                echo "Wymiana simeringów";
                echo "<br>";
            }
            if($_SESSION['part_valve_seats'] == 1){
                echo "Wymiana gnizad zaworowych";
                echo "<br>";
            }
*/
            echo "</div>";
            echo "</div>";
            echo "<div class='data'>";            
            echo "<div class='data_text'>";
            echo "<span class='summary'>Dane:</span>";
            echo "<br>";
            echo "<br>";
            echo "Imię: ";
            echo $_SESSION['fname'];
            echo "<br>";
            echo "Nazwisko: ";
            echo $_SESSION['lname'];
            echo "<br>";
            echo "Email: ";
            echo $_SESSION['email'];
            echo "<br>";
            echo "Numer telefonu: ";
            echo $_SESSION['tel_number'];
            echo "<br>"; 
            echo "Kraj: ";
            echo $_SESSION['country'];
            echo "<br>";
            echo "Województwo: ";
            echo $_SESSION['state'];
            echo "<br>";
            echo "Miasto: ";
            echo $_SESSION['city'];
            echo "<br>";
            echo "Adres: ";
            echo $_SESSION['address'];
            echo "<br>";
            echo "Kod pocztowy: ";
            echo $_SESSION['code'];
            echo "<br>";
            echo "<br>";
            echo "</div>";
            echo "<div class='data_text'>";
            echo "<span class='summary'>Dane do faktury:</span>";           
            echo "<br>";
            echo "<br>";            
            echo "Nazwa firmy: ";
            echo $_SESSION['company'];
            echo "<br>";
            echo "NIP: ";
            echo $_SESSION['nip'];
            echo "<br>";
            echo "</div>";
        ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?step=5" method='POST'>
                <div class='data_text'>
                    <label for="rules">Akceptuje <a href="regulamin.pdf">Regulamin</a>:</label>
                    <div class="error">
                        <span><?php if(isset($_SESSION['rulesErr'])){echo $_SESSION['rulesErr']; }?></span>
                    </div>
                    <input type="checkbox" name="rules" id="rules">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <label for="privacy">Akceptuje <a href="Polityk prywatnosci.pdf">Polityke prywatności</a>:</label>
                    <div class="error">
                        <span><?php if(isset($_SESSION['privacyErr'])){echo $_SESSION['privacyErr']; }?></span>
                    </div>
                    <input type="checkbox" name="privacy" id="privacy">
                </div>
                <div style="clear:both"></div>
                <div class='data_text'>
                    <input type="submit" value="Potwierdź i zakończ">
                </div>
            </form> 
            
        </div>
</div>