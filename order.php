<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MOTO-SZLIF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="src/api/git.d.ts">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
            include('data.php');
        }
        else {
            if($_GET['step'] == 2){
                include('head_data.php');
            }
            else if($_GET['step'] == 3){
                include('services.php');
            }
            else if($_GET['step'] == 4){
                include('summary.php');
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
function otwieracz(){
document.getElementById("open").style.display = 'none';
document.getElementById("close").style.display = 'block';
document.getElementById("menu-content").style.display = 'block';
}

function zamykacz(){
document.getElementById("open").style.display = 'block';
document.getElementById("close").style.display = 'none';
document.getElementById("menu-content").style.display = 'none';
}
        
</script>   

</html>