

<?php
    echo "<div class='number'><span>6</span></div><h2>Krok szósty</h2>";
    $conn = mysqli_connect("localhost", 'root', '', 'm-s');
    if (mysqli_connect_errno()) {
        "Błąd połączenia nr: " . mysqli_connect_errno();
        "Opis błędu: " . mysqli_connect_error();
    exit();
}

        $eng_num = "";
        if(isset($_SESSION['eng_num'])){
                    
            $eng_num = "Eng_num = '".$_SESSION['eng_num']."',";
            
        }
        $company = "";
        if(isset($_SESSION['company'])){
                    
            $company = "Company = '".$_SESSION['company']."'";
            
        }$nip = "";
        if(isset($_SESSION['nip'])){
                    
            $nip = "NIP = '".$_SESSION['nip']."'";
            
        }
                $sql_head = ("INSERT INTO `head_data` SET Mark = '".$_SESSION['mark'] . "', Model = '".$_SESSION['model']."', Year = '".$_SESSION['year']."', Capacity = '".$_SESSION['capacity']."', Fuel = '".$_SESSION['fuel']."', ".$eng_num." Valve = '".$_SESSION['valve']."'");                

                $sql_customer = ("INSERT INTO `customer` SET Fname ='".$_SESSION['fname']."', Lname = '".$_SESSION['lname']."', Email = '".$_SESSION['email']."', Number = '".$_SESSION['tel_number']."', Country = '".$_SESSION['country']."', State = '".$_SESSION['state']."', City = '".$_SESSION['city']."', Adress = '".$_SESSION['address']."', Code = '".$_SESSION['code']."', ".$company .", ". $nip .", Date= CURRENT_TIMESTAMP()");

                $sql_customer_checked = ("SELECT * FROM customer WHERE Fname ='".$_SESSION['fname']."'AND Lname = '".$_SESSION['lname']."'AND Email = '".$_SESSION['email']."'AND Number = '".$_SESSION['tel_number']."'AND Country = '".$_SESSION['country']."'AND State = '".$_SESSION['state']."'AND City = '".$_SESSION['city']."'AND Adress = '".$_SESSION['address']."'AND Code = '".$_SESSION['code']."'AND ".$company." AND ". $nip." AND Date >= NOW() - INTERVAL 1 DAY");

                $sql_customer_checked_select = $conn->query($sql_customer_checked);

                
                if($sql_customer_checked_select->num_rows >= 1){
                    echo "<span style=color:#c70f0f;>Możesz zrobić jedno zamówienie dziennie</span>";
                    echo "</div>";
                }
                else{               
                
                $conn ->query($sql_customer);
                $conn ->query($sql_head);
                $sql_customer_select = ("SELECT Id_Usr FROM customer WHERE Date = CURRENT_TIMESTAMP()");
                $result_customer = $conn ->query($sql_customer_select);
                $result_customer_id = $result_customer->fetch_assoc(); 
                print_r($result_customer_id);
                $_SESSION['Id_Usr'] = $result_customer_id['Id_Usr'];

                $sql_head_select = ("SELECT Id_head FROM head_data WHERE Date = CURRENT_TIMESTAMP()");
                $result_head = $conn ->query($sql_head_select);
                $result_head_id = $result_head->fetch_assoc(); 
                print_r($result_head_id);
                $_SESSION['Id_head'] = $result_head_id['Id_head'];

                $sql = "SELECT `Id_part` FROM `parts`";
            $result = $conn->query($sql);        
            $part = "'";
            $part2 = '';
            
            while($x = $result->fetch_assoc()){
                
                $id = $x['Id_part'];   
                
                    for ($int1 = 0; $int1 = 0; $int1++) {
                        if(isset($_SESSION['parts_'.$id])){
                            $part2 .="'".$_SESSION['parts_'.$id]."'";
                        }
                    }
    
                    if(isset($_SESSION['parts_'.$id])){
                        $part2 .=". '".$_SESSION['parts_'.$id]."'";
                        
                    }               
            }
            $part2 = addslashes($part2);
            $part2 = ltrim($part2, ". ");
            $part2 .= "'";
            $part .= $part2;

            if($part == "''"){
                $part = "NULL";
            }
           

            $sql = "SELECT `Id` FROM `services`";
            $result = $conn->query($sql);        
            $name = "'";
            $name2 = '';
            
            while($x = $result->fetch_assoc()){
                
                $id = $x['Id'];   
                
                    for ($int1 = 0; $int1 = 0; $int1++) {
                        if(isset($_SESSION['services_'.$id])){
                            $name2 .="'".$_SESSION['services_'.$id]."'";
                        }
                    }
    
                    if(isset($_SESSION['services_'.$id])){
                        $name2 .=". '".$_SESSION['services_'.$id]."'";
                        
                    }               
            }
            $name2 = addslashes($name2);
            $name2 = ltrim($name2, ". ");
            $name2 .= "')";
            $name .= $name2;



                $sql_orders = ("INSERT INTO `orders` (`Id_order`, `Id_Usr`, `Id_head`, `Name_parts`, `Name_services`) VALUES (NULL, '". $_SESSION['Id_Usr']."', '". $_SESSION['Id_head']."', " .$part. ", " .$name);
                $conn->query($sql_orders);
                echo $sql_orders;

              
                echo "<span>Twoje zamówienie zostało przyjęte. Teraz tylko wyślij nam swoją głowicę lub dostarcz ją osobiście</span>";
                echo "</div>";
                echo "<div id='form' style='max-width:700px; height:1000px';>";
                echo "<div id='data'>";
                echo "<div style='text-align:center; font-size:1vw; margin-bottom:20px;'>";     
                echo "<span><p style='font-size:1.2vw;'>Gdzie wysłać?</p><br>Miasto: Łódź<br>Ulica i numer: 11 Listopada 3 <br> Kod pocztowy: 91-370<br></span>";           
                echo "<a href='https://www.dpdpickup.pl/Wycen-i-nadaj-Online/nadaj-online/przesylka-krajowa' style='color:#c70f0f; text-decoration:none;' target='_blanc'>Znajdź Punkt DPD Pickup w Twojej okolicy.</a>" ;                
                echo "</div>";
                echo "<br>";
                echo "<div style='text-align:center; font-size:1.2vw; color:#c70f0f;'>";
                echo "Instrukcja pakowanie głowicy:";
                echo "</div>";
                echo "<div class='packing'>";
                echo "<span>1. Wytrzyj główicę z pozostałóści oleju oraz chłodziwa, upewnij się, że nie zostały świece oraz kolektory.</span>";
                echo "<img src='Graphic/Packing1.svg' width='200px' height='100px'>";
                echo "</div>";
                echo "<div class='packing'>";
                echo "<span>2. Zapakuj głowicę w worek foliowy lub owiń tkaniną by podczas transportu płyn który mógłby się z niej wylać nie uszkodził kartonu.</span>";
                echo "<img src='Graphic/Packing2.svg' width='200px' height='100px'>";
                echo "</div>";
                echo "<div class='packing'>";
                echo "<span>3. Włóż głowicę do kartonu np. po odkurzaczu.</span>";
                echo "<img src='Graphic/Packing3.svg' width='200px' height='100px'>";
                echo "</div>";
                echo "<div class='packing'>";
                echo "<span>4. Zabezpiecz głowcie styropianem, folią bąbelkową, granulatem ze styropianu lub ciasno ubitym papierem.</span>";
                echo "<img src='Graphic/Packing4.svg' width='200px' height='100px'>";
                echo "</div>";
                echo "<div class='packing'>";
                echo "<span>5. Zaklej dobrze paczkę by nie otworzyła się podczas transportu.</span>";
                echo "<img src='Graphic/Packing5.svg' width='200px' height='100px'>";
                echo "</div>";
                echo "<div class='packing'>";
                echo "<span>6. Na tak zapakowane pudełko naklej naklejki z kieliszkiem na każdą scianę oraz etykiete z adresem. Tak przygotowaną paczkę oddaj kurierowi zaparz kawe i czekaj na telefon.</span>";
                echo "<img src='Graphic/Packing6.svg' width='200px' height='100px'>";
                echo "</div>";  
                 
               }
                //echo $sql_customer;



            
                
        ?>
      

            
            
        <!-- </div>
</div> -->