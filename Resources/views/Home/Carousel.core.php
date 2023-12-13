<!-- Carousel -->
<div id="indicators-carousel" class="relative lg:w-full w-screen lg:left-0 -left-4 lg:-mt-7 -mt-11 z-40" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-96 overflow-hidden rounded-lg md:h-96">
        <?php foreach ($carousels as $carousel) : ?>
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= $carousel['img_url'] ?>" class="absolute block w-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="<?= $carousel['title'] ?>">
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Slider indicators -->
    <div id="carousel-indicators" class="absolute z-50 flex -translate-x-1/2 bottom-20 left-1/2 space-x-3 rtl:space-x-reverse">
        <?php foreach ($carousels as $idx => $carousel) : ?>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide <?= $idx + 1 ?>" data-carousel-slide-to="<?= $idx ?>" onclick="activeSlide(<?= $idx ?>)"></button>
        <?php endforeach; ?>
    </div>

    <div class="grid grid-cols-1">
        <div class="col-span-12">

        </div>
    </div>
</div>
<!-- End Carousel -->