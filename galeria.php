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