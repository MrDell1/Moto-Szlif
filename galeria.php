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
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177332583-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177332583-1');
</script>

</head>
<body>
<?php
  include('menu.php');
?>

<div id="container">
    <div id="pojemnik-resp">
    <div id="custom-events" style="padding-top:20px;">
      <div class="grow">
        <ul>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
              <img src="photo1.jpeg" />     
              <div class="nazwa">FRANKFURT</div>         
          </a>
          
         </li>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo3.jpeg" />
               <div class="nazwa">FRANKFURT</div>  
            </a>
         </li>
         <li class="zdj"> 
            <a class="zdj" href="pokaz.html">
                <img src="photo3.jpeg" />
                <div class="nazwa">FRANKFURT</div>  
             </a>
          </li>
        </ul>
      </div>
     </div> 
     <div id="custom-events">
        <div class="grow">
        <ul>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo1.jpeg"/>
              <div class="nazwa">FRANKFURT</div>  
          </a>
         </li>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo3.jpeg" />
               <div class="nazwa">FRANKFURT</div>  
            </a>
         </li>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo3.jpeg" />
                <div class="nazwa">FRANKFURT</div>  
             </a>
          </li>
        </ul>
        </div>
     </div>
     <div id="custom-events">
        <div class="grow">
        <ul>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo1.jpeg" />
              <div class="nazwa">FRANKFURT</div>  
          </a>
         </li>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo3.jpeg" />
               <div class="nazwa">FRANKFURT</div>  
            </a>
         </li>
         <li class="zdj">
            <a class="zdj" href="pokaz.html">
                <img src="photo3.jpeg" />
                <div class="nazwa">FRANKFURT</div>  
             </a>
          </li>
        </ul>
        </div>
    </div>
     </div>  

    <div class="pojemnik-resp">
        <div id="custom-events" style="padding-top:20px;">
          <div class="grow">
            <ul>
             <li class="zdj">
                <a class="zdj" href="pokaz.html">
                  <img src="photo1.jpeg" />     
                  <div class="nazwa">FRANKFURT</div>         
              </a>
              
             </li>
             <li class="zdj">
                <a class="zdj" href="pokaz.html">
                    <img src="photo3.jpeg" />
                   <div class="nazwa">FRANKFURT</div>  
                </a>
             </li>
            </ul>
          </div>
         </div> 
         <div id="custom-events">
            <div class="grow">
            <ul>
             <li class="zdj">
                <a class="zdj" href="pokaz.html">
                    <img src="photo1.jpeg"/>
                  <div class="nazwa">FRANKFURT</div>  
              </a>
             </li>
             <li class="zdj">
                <a class="zdj" href="pokaz.html">
                    <img src="photo3.jpeg" />
                   <div class="nazwa">FRANKFURT</div>  
                </a>
             </li>
             </ul>
            </div>
         </div>
         <div id="custom-events">
            <div class="grow">
            <ul>
             <li class="zdj">
                <a class="zdj" href="pokaz.html">
                    <img src="photo1.jpeg" />
                  <div class="nazwa">FRANKFURT</div>  
              </a>
             </li>
             <li class="zdj">
                <a class="zdj" href="pokaz.html">
                    <img src="photo3.jpeg" />
                   <div class="nazwa">FRANKFURT</div>  
                </a>
             </li>             
            </ul>
            </div>
        </div>
         </div>  
         <div id="teraz">
            <div id="dzwon">
              <div id="zamow"><span>NIE CZEKAJ, TWÓJ SILNIK SAM SIĘ NIE NAPRAWI, ZADZWOŃ I UMÓW SIĘ JUŻ DZIŚ!<br><p>123456789</p></span></div>
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