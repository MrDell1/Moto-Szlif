<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide h-96 bg-cover flex justify-center items-center">
      <img class="w-full" alt="planowanie bloku" src="assets/planowanie.webp" />
    </div>
    <div class="swiper-slide h-96 bg-cover flex justify-center items-center">
      <img class="w-full" alt="regeneracja głowicy" src="assets/glowicaZawor.webp" />
    </div>
    <div class="swiper-slide h-96 bg-cover flex justify-center items-center">
      <img class="w-full" alt="regeneracja silnika" src="assets/silnikSkladanie.webp" />
    </div>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<script
  is:inline
  src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"
></script>
<script is:inline>
  new Swiper(".mySwiper", {
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<style>
  .swiper {
    height: 24rem;
  }
</style>
