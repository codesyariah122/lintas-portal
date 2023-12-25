<!-- Swiper -->
<div class="relative lg:max-w-lg w-screen lg:-left-4 -left-4 lg:mt-2 xl:-mt-20 md:-mt-5 -mt-[5.2rem] z-40">
    <div class="swiper-carousel swiper-container overflow-hidden">
        <div class="swiper-wrapper">
            <?php foreach ($carousels as $carousel) : ?>
                <div class="swiper-slide">
                    <img src="<?= $carousel['img_url'] ?>" alt="<?= $carousel['title'] ?>" class="w-full shadow-lg mt-6">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <?php require_once __DIR__ . "/../../Home/Molecules/PanelCard.core.php"; ?>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let swiperCarousel = new Swiper('.swiper-carousel', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>
