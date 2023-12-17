<!-- Carousel -->
<div class="relative lg:w-full w-screen lg:left-0 -left-4 lg:-mt-2 xl:-mt-20 md:-mt-5 z-40" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden rounded-lg h-96 sm:h-80 shadow-md ">
        <?php foreach ($carousels as $carousel) : ?>
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= $carousel['img_url'] ?>" class="absolute block lg:h-96 h-80 rounded-sm w-full rounded-lg shadow-md -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:mt-2 mt-8" alt="<?= $carousel['title'] ?>">
                <!-- <div class="absolute inset-0 bg-black  opacity-10 rounded-sm lg:h-96 h-96 lg:-mt-2 mt-12"></div> -->
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Slider indicators -->
    <div id="carousel-indicators" class="absolute z-50 flex -translate-x-1/2 bottom-10 left-1/2 space-x-3 rtl:space-x-reverse">
        <?php foreach ($carousels as $idx => $carousel) : ?>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide <?= $idx + 1 ?>" data-carousel-slide-to="<?= $idx ?>" onclick="activeSlide(<?= $idx ?>)"></button>
        <?php endforeach; ?>
    </div>

    <?php require_once __DIR__ . "/../../Home/Molecules/PanelCard.core.php"; ?>

</div>
<!-- End Carousel -->