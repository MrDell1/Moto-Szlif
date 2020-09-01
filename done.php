<div class='number'><span>6</span></div><h2>Krok szósty</h2>
        <span>Twoje zamówienie zostało przyjęte. Teraz tylko wyślij nam swoją głowicę lub dostarcz ją osobiście</span>
    </div>
<div id="form" style="max-width:850px;">  
    <div id="data">

        <?php

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
                    
            $company = "Company = '".$_SESSION['company']."',";
            
        }$nip = "";
        if(isset($_SESSION['nip'])){
                    
            $nip = "NIP = '".$_SESSION['nip']."'";
            
        }
                $sql_head = ("INSERT INTO `head_data` SET Mark = '".$_SESSION['mark'] . "', Model = '".$_SESSION['model']."', Year = '".$_SESSION['year']."', Capacity = '".$_SESSION['capacity']."', Fuel = '".$_SESSION['fuel']."', ".$eng_num." Valve = '".$_SESSION['valve']."'");
                $sql_head_select = ("SELECT Id_head FROM head_data WHERE Date = CURRENT_DATE()");

               // echo $sql_head;
                echo "<br>";

                $sql_customer = ("INSERT INTO `customer` SET Fname ='".$_SESSION['fname']."', Lname = '".$_SESSION['lname']."', Email = '".$_SESSION['email']."', Number = '".$_SESSION['tel_number']."', Country = '".$_SESSION['country']."', State = '".$_SESSION['state']."', City = '".$_SESSION['city']."', Adress = '".$_SESSION['address']."', Code = '".$_SESSION['code']."', ".$company. $nip);
                $sql_customer_select = ("SELECT Id_Usr FROM customer WHERE Date = CURRENT_DATE()");
                
                //echo $sql_customer;



            $sql = "SELECT `Id` FROM `services`";
            $result = $conn->query($sql);        
            $name = "'";
            $name2 = '';
            
            while($x = $result->fetch_assoc()){
                //$a = $a + 1;
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
            
            




            $sql = "SELECT `Id` FROM `services`";
            $result = $conn->query($sql);        
            $name = "'";
            $name2 = '';
            
            while($x = $result->fetch_assoc()){
                //$a = $a + 1;
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



                $sql_orders = ("INSERT INTO `orders` (`Id_order`, `Id_Usr`, `Id_head`, `Name_parts`, `Name_services`) VALUES (NULL, '4', '2', NULL, " .$name);
                echo $sql_orders;
                
        ?>
        <?php 
                
              /*
                
                
               
                echo $_SESSION['valve']; 
                
                if($_SESSION['type'] == "row_eng"){
                    
                };
                if($_SESSION['type'] == "v_eng"){
                    
                };
                if($_SESSION['type'] == "w_eng"){
                    
                };
                if($_SESSION['type'] == "boxer_eng"){
                   
                };



                if($_SESSION['part_valve'] == 1){
                  
                    
                              
                if($_SESSION['part_sealant'] == 1){
                                 
                if($_SESSION['part_pusher'] == 1);{
                         
                if($_SESSION['part_fence'] == 1){

                if($_SESSION['part_vortex'] == 1){
                  
                if($_SESSION['part_sime'] == 1){
                    
                if($_SESSION['part_valve_seats'] == 1){
                    
               

                
            $conn = mysqli_connect("localhost", 'root', '', 'm-s');
            if (mysqli_connect_errno()) {
                Błąd połączenia nr: " . mysqli_connect_errno();
                Opis błędu: " . mysqli_connect_error();
                exit();
            }

            $sql = "SELECT * FROM `services` ORDER BY `services`.`Name` ";
            $result = $conn->query($sql);        
           
            while($x = $result->fetch_assoc()){
                
                $id = $x['Id'];                
                if(isset($_SESSION['services_'.$id])){
                    echo $_SESSION['services_'.$id];
                
                }
            }

            
            echo ;
            
            echo ;
           
            echo ;
         
            echo ;
            
            echo ;
            
            echo ;
            
            echo ;
           
            echo ;
           
            echo ;
            
            
                    
            
            echo $_SESSION['company'];
            
            echo $_SESSION['nip'];
          */  
        ?>

            
            
        </div>
</div>