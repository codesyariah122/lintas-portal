<div class="article__wrapper px-4 py-6 w-screen">

    <div class="mb-6">
        <div>
            <h2 class="text-gray-900 font-bold mb-1">Solidaritas Kemanusiaan</h2>
            <p class="text-gray-600 text-sm">Bantu saudara kita di Palestina</p>
        </div>
    </div>

    <!-- Untuk Desktop -->
    <div class="relative hidden md:block">
        <div class="relative w-full flex snap-x gap-4 overflow-x-auto">
            <div class="shrink-0 first:pl-4 last:pr-4">
                <div class="w-full flex space-x-4">
                    <?php foreach ($articles as $article) : ?>
                        <div class="relative flex transition-shadow duration-150 w-full h-full overflow-hidden  flex-col border mb-2 rounded-xl pb-0 shadow-sm hover:shadow-md bg-white">
                            <div class="lg:w-80 sm:w-60 lg:-ml-2 sm:-ml-2  bg-white border border-gray-200 rounded-lg shadow-md mx-w-sm">
                                <a href="#">
                                    <img class="rounded-t-lg" src="<?= $article['img'] ?>" alt="" />
                                </a>
                                <div class="p-5 text-left">
                                    <a href="#">
                                        <h5 class="mb-2 lg:text-lg text-sm font-bold tracking-tight text-gray-900"><?= $article['title'] ?></h5>
                                    </a>
                                    <div class="mt-auto">
                                        <div class="bg-gray-200 w-full h-1 mb-2 rounded overflow-hidden ">
                                            <div class="h-1 max-w-full bg-orange-500" style="width: 93%;"></div>
                                        </div>
                                        <div class="flex justify-between">
                                            <div>
                                                <div class="text-sm font-semibold whitespace-no-wrap">
                                                    Rp <?= $article['total_donation'] ?>
                                                </div>
                                                <div class="text-xs text-gray-600">
                                                    Donasi Terkumpul dari <span>Rp. <?= $article['terkumpul_dari'] ?></span>
                                                </div>
                                            </div>
                                            <div class="text-right text-gray-600">
                                                <div class="text-xs">
                                                    <div class="font-semibold"><?= $article['expired'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Untuk Mobile -->
    <div class="swiper mySwiper lg:hidden xl:hidden md:hidden sm:block">
        <div class="swiper-wrapper flex space-x-20">
            <?php foreach ($articles as $article) : ?>
                <div class="swiper-slide">
                    <div class="w-62 bg-white border border-gray-200 rounded-lg shadow-md">
                        <a href="#">
                            <img class="rounded-t-lg" src="<?= $article['img'] ?>" alt="" />
                        </a>
                        <div class="p-5 text-left">
                            <a href="#">
                                <h5 class="mb-2 lg:text-lg text-sm font-bold tracking-tight text-gray-900"><?= $article['title'] ?></h5>
                            </a>
                            <div class="mt-auto">
                                <div class="bg-gray-200 w-full h-1 mb-2 rounded overflow-hidden ">
                                    <div class="h-1 max-w-full bg-orange-500" style="width: 93%;"></div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <div class="text-sm font-semibold whitespace-no-wrap">
                                            Rp <?= $article['total_donation'] ?>
                                        </div>
                                        <div class="text-xs text-gray-600">
                                            Donasi Terkumpul dari <span>Rp. <?= $article['terkumpul_dari'] ?></span>
                                        </div>
                                    </div>
                                    <div class="text-right text-gray-600">
                                        <div class="text-xs">
                                            <div class="font-semibold"><?= $article['expired'] ?> Lagi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="swiper-scrollbar"></div>

    </div>
</div>