document.addEventListener("DOMContentLoaded", function () {
  feather.replace();

  // SwiperJs Carousel
  let swiperCarousel = new Swiper(".swiper-carousel", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // Articles SwiperJs
  let articleSwiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: -60,
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: false,
    },
  });
});
