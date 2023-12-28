<!-- Swiper -->
<div class="relative carousel-hero lg:max-w-lg w-full xl:-mt-20 lg:-mt-20  md:-mt-5 -mt-[4.2rem] z-1">
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