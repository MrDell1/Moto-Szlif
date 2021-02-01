<div class='number'><span>3</span></div>
 <h2>Krok trzeci </h2>
 <span>Zaznacz z których usług chcesz skorzystać, <br>niektóre usługi wiążą się z kosztami nowych część nie wliczonych w
     cene usługi np. Wymiana zaworów. <br> Podane ceny są poglądowe i są cenami netto, pełny kosztorys zostnie przesłany po otrzymaniu przez nas głowicy</span>
 </div>
 <div id="form" style="max-width: 900px!important; height: 1100px!important">
     <div id="data">
     <?php
            $conn = mysqli_connect('localhost', 'root', '', 'm-s');
            if (mysqli_connect_errno()) {
                echo "Błąd połączenia nr: " . mysqli_connect_errno();
                echo "Opis błędu: " . mysqli_connect_error();
                exit();
            }

            $sql = "SELECT * FROM `services`";


            $result = $conn->query($sql);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    while($x = $result->fetch_assoc()){
                        $id = $x['Id'];                       
                       if(isset($_POST[$id])){
                        if($_POST[$id] == 'on'){

                            $_SESSION['services_'.$id] = $x['Name'];
                        }                  
                                                
                       }
                       else{
                        unset($_SESSION['services_'.$id]);
                    }
                    }
                    
                    header("Location:order.php?step=4");
                  }
            ?>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?step=3" method='POST'>

             <?php

                $sql = "SELECT * FROM `services` ORDER BY `services`.`Name` ASC";


                $result = $conn->query($sql);

                $label = 0;
                while($x = $result->fetch_assoc()){
                    $label = $label + 1;
                    if($label == 1){
                        echo "<div class='label'>";
                    }
                    else if($label == 12){
                        echo "</div>";
                        echo "<div class='label'>";
                    }
                    else if($label == 22){
                        echo "</div>";
                    }
                   
                    echo "<div class='services_text'>";
                    echo "<input type='checkbox' name=" . $x['Id'] . " id=" . $x['Id']."";
                    if($x['Name'] == 'Czyszczenie' || $x['Name'] == 'Demontaż' || $x['Name'] == 'Montaż'){
                        echo " checked";
                    }; 
                    echo">";
                    echo "<div onclick='myFunction(" . $x['Id'] . ")' class='popup' id=" . $x['Id'] . "_popup >" . $x['Description'] . "</div>";
                    echo "<i class='fa fa-info-circle' onclick='myFunction(" . $x['Id'] . ")'></i>";
                    echo "<label for=" . $x['Id'] . ">" . $x['Name'] . ": <br> Od " . $x['Price_8'] . " do " . $x['Price_16'] . " zł</label>";
                    echo "</div>";
    
                }
                echo "<div style='clear:both'></div> <div class='data_text'>  <input type='submit' value='Następny krok'>";
                echo "</div>";

            ?>
            
            
         </form>
     </div>
 </div>

 
    