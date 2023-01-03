<div class="flex justify-between md:justify-center flex-row md:flex-col items-center">
  <div class="flex pr-4 md:pr-8 lg:pr-40 w-full gap-4 md:gap-6 flex-col md:flex-row justify-between">
    <div class="flex justify-center py-3 bg-[#00046b] rounded-br-full">
      <a class="py-3 px-8 w-fit" href="index.php">
        <h2 class="text-[#d01616] font-[Antonio] font-bold flex text-3xl lg:text-4xl">
          MOTO-SZLIF
          <p class="inline-block w-fit text-base">&#174;</p>
        </h2>
      </a>
    </div>

    <div class="py-3 hidden md:flex gap-3 flex-row">
      <div class="flex-row flex items-center">
        <span class="material-symbols-outlined">
          location_on
        </span>
        <div class="px-2">
          <h3 class="text-base lg:text-xl font-bold">Adres</h3>
          <a href="https://goo.gl/maps/4mkw5Nt21dWsVgYH7" target="_blank" class="text-sm lg:text-base">
            Łódź 11 Listopada 3
          </a>
        </div>
      </div>
      <div class="flex-row flex items-center">
        <span class="material-symbols-outlined">
          call
        </span>
        <div class="px-2">
          <h3 class="text-base lg:text-xl font-bold">Zadzwoń</h3>
          <a href="tel:+48691-675-201" target="_blank" class="text-sm lg:text-base">
            +48 691 675 201
          </a>
        </div>
      </div>
      <div class="flex-row flex items-center">
        <span class="material-symbols-outlined">
          schedule
        </span>
        <div class="px-2">
          <h3 class="text-base lg:text-xl font-bold">Pracujemy</h3>
          <p class="text-sm lg:text-base">Pn-Pt 8:00-16:00</p>
        </div>
      </div>
      <div class="flex-row flex items-center">
        <div class="px-2">
          <a 
          <?php 
          isLogin()
          ?>
          >
            <span class="material-symbols-outlined text-3xl lg:text-5xl">
              person
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden md:flex justify-center bg-[#ab1717] w-full mt-1">
    <a href="index.php" class="px-10 py-2 text-xl font-medium text-white hover:bg-[#00046b]">
      Strona Główna
    </a>
    <a href="ofirmie.php" class="px-10 py-2 text-xl font-medium text-white hover:bg-[#00046b]">
      O nas
    </a>
    <a href="uslugi.php" class="px-10 py-2 text-xl font-medium text-white hover:bg-[#00046b]">
      Usługi
    </a>
    <a href="oferta.php" class="px-10 py-2 text-xl font-medium text-white hover:bg-[#00046b]">
      Oferta
    </a>

  </div>
  <div class="py-3 px-4 block md:hidden">
    <div>
      <button aria-label="menu" id="menu-triger" class="bg-[#ab1717] rounded-md py-2 px-2 w-10 h-10 justify-around flex flex-col">
        <div class="w-full bg-white h-1 rounded-lg"></div>
        <div class="w-full bg-white h-1 rounded-lg"></div>
        <div class="w-full bg-white h-1 rounded-lg"></div>
      </button>

      <div id="menu" class="flex-col gap-3 py-3 justify-center top-16 rounded-md text-center bg-[#ab1717] hidden absolute w-40 right-4">
        <a href="index.php" class="px-4 py-2 text-base font-medium text-white hover:bg-[#00046b]">
          Strona Główna
        </a>
        <a href="ofirmie.php" class="px-4 py-2 text-base font-medium text-white hover:bg-[#00046b]">
          O nas
        </a>
        <a href="uslugi.php" class="px-4 py-2 text-base font-medium text-white hover:bg-[#00046b]">
          Usługi
        </a>
        <a href="oferta.php" class="px-4 py-2 text-base font-medium text-white hover:bg-[#00046b]">
          Oferta
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("menu-triger").addEventListener("click", tooglMenu);

  function tooglMenu() {
    console.log("xxx");
    document.getElementById("menu").classList.toggle("menuShow");
  }
</script>
<style>
  .menuShow {
    display: flex;
  }
</style>
<?php
function isLogin()
{
  if (!empty($_SESSION['login_user'])) {
    if ($_SESSION['role'] == 'admin') {
      return "href='profile.php?step=5'";
    } else {
      return "href='profile.php'";
    }
  } else {
    return "href='login.php'";
  }
} ?>