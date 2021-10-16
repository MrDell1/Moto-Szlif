<!DOCTYPE html>
<html lang="pl">

<head>
<?php
  include('head.php');
?>

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
    if(<?php echo $_SESSION['parts_script_1']; ?> == 1){
        valve.checked = true;
        valve.disabled = "disabled";
    }
    else{
        valve.checked = false;
        valve.disabled = false; 
    }
    if(<?php echo $_SESSION['parts_script_2']; ?> == 1){
        sealant.checked = true;
        sealant.disabled = true;
    }
    else{
        sealant.checked = false;
        sealant.disabled = false; 
    }
    if(<?php echo $_SESSION['parts_script_3']; ?> == 1){
        pusher.checked = true;
        pusher.disabled = true;
    }
    else{
        pusher.checked = false;
        pusher.disabled = false; 
    }
    if(<?php echo $_SESSION['parts_script_4']; ?> == 1){
        fence.checked = true;
        fence.disabled = true;
    }
    else{
        fence.checked = false;
        fence.disabled = false; 
    }
    if(<?php echo $_SESSION['parts_script_6']; ?> == 1){
        vortex.checked = true;
        vortex.disabled = true;
    }
    else{
        vortex.checked = false;
        vortex.disabled = false; 
    }
    if(<?php echo $_SESSION['parts_script_7']; ?> == 1){
        sime.checked = true;
        sime.disabled = true;
    }
    else{
        sime.checked = false;
        sime.disabled = false; 
    }
    if(<?php echo $_SESSION['parts_script_5']; ?> == 1){
        valve_seats.checked = true;
        valve_seats.disabled = true;
    }
    else{
        valve_seats.checked = false;
        valve_seats.disabled = false; 
    }
</script>

</html>