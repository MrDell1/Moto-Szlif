<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MOTO-SZLIF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="src/api/git.d.ts">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="new1.css" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


</head>

<body>
    <?php
  include('menu.php');
?>

    <div id="container">
        <div id="step">
            <?php
        if(!isset($_GET['step'])){
            include('head_data.php');
        }
        else {
            if($_GET['step'] == 2){
                include('parts.php');
                
            }
            else if($_GET['step'] == 3){
                include('services.php');
            }
            else if($_GET['step'] == 4){                
                include('data.php');
            }
            else if($_GET['step'] == 5){
                include('summary.php');
            }
            else if($_GET['step'] == 6){
                include('done.php');
            }
        }
        ?>
        </div>
    </div>

    <?php
  include('footer.php');
?>
</body>
<script>
function otwieracz() {
    document.getElementById("open").style.display = 'none';
    document.getElementById("close").style.display = 'block';
    document.getElementById("menu-content").style.display = 'block';
}

function zamykacz() {
    document.getElementById("open").style.display = 'block';
    document.getElementById("close").style.display = 'none';
    document.getElementById("menu-content").style.display = 'none';
}
</script>

<script>
// When the user clicks on div, open the popup
function myFunction(x) {
    var popup = document.getElementById(x + "_popup");
    popup.classList.toggle("show");
}
</script>
<script>
function Eng_change() {
    var type = document.getElementById("type").value;
    var quantity_id = document.getElementById("quantity_id");
    if (type == "v_eng" || type == "w_eng") {
        quantity_id.style.display = "block";
    } else {
        quantity_id.style.display = "none";
    }
}
</script>
<script>
    var valve = document.getElementById("8");
    var sealant = document.getElementById("14");
    var pusher = document.getElementById("21");
    var fence = document.getElementById("9");
    var vortex = document.getElementById("13");
    var sime = document.getElementById("20");
    var valve_seats = document.getElementById("11");
    if(<?php echo $_SESSION['part_valve']; ?> == 1){
        valve.checked = true;
        valve.disabled = "disabled";
    }
    else{
        valve.checked = false;
        valve.disabled = false; 
    }
    if(<?php echo $_SESSION['part_sealant']; ?> == 1){
        sealant.checked = true;
        sealant.disabled = true;
    }
    else{
        sealant.checked = false;
        sealant.disabled = false; 
    }
    if(<?php echo $_SESSION['part_pusher']; ?> == 1){
        pusher.checked = true;
        pusher.disabled = true;
    }
    else{
        pusher.checked = false;
        pusher.disabled = false; 
    }
    if(<?php echo $_SESSION['part_fence']; ?> == 1){
        fence.checked = true;
        fence.disabled = true;
    }
    else{
        fence.checked = false;
        fence.disabled = false; 
    }
    if(<?php echo $_SESSION['part_vortex']; ?> == 1){
        vortex.checked = true;
        vortex.disabled = true;
    }
    else{
        vortex.checked = false;
        vortex.disabled = false; 
    }
    if(<?php echo $_SESSION['part_sime']; ?> == 1){
        sime.checked = true;
        sime.disabled = true;
    }
    else{
        sime.checked = false;
        sime.disabled = false; 
    }
    if(<?php echo $_SESSION['part_valve_seats']; ?> == 1){
        valve_seats.checked = true;
        valve_seats.disabled = true;
    }
    else{
        valve_seats.checked = false;
        valve_seats.disabled = false; 
    }
</script>

</html>