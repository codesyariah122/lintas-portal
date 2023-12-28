<div class="program__sedekah-wrapper w-screen">
    <div class="px-4 mb-6 py-6">
        <div>
            <h2 class="text-gray-900 font-bold mb-1">Sedekah Al-Quran Yuk</h2>
            <p class="text-gray-600 text-sm">Raih pahala jariyah dari setiap huruf yang dibaca</p>
        </div>
    </div>
    <div class="relative">
        <div class="relative w-full flex snap-x gap-4 overflow-x-auto">
            <?php foreach ($jariyahs as $jariyah) : ?>
                <div class="snap-center shrink-0 first:pl-4 last:pr-4">
                    <div class="w-[280px] flex h-full">
                        <div class="relative flex transition-shadow duration-150 w-full overflow-hidden  flex-col border mb-2 rounded-xl pb-0 shadow-sm hover:shadow-md bg-white">
                            <figure class="flex-shrink-0 overflow-hidden w-full">
                                <div class="block relative overflow-hidden bg-gray-200 pb-[55.1388%] ">
                                    <img src="<?= $jariyah['img'] ?>" sizes="(max-width: 1024px) 200px, 300px" class="absolute inset-0 w-full h-full object-cover" alt="<?= $jariyah['title'] ?>">
                                </div>
                            </figure>
                            <div class="w-full flex flex-col flex-1 overflow-hidden p-3">
                                <h3 class="font-semibold text-xs overflow-hidden two-line leading-snug"><?= $jariyah['title'] ?></h3>
                                <div class="flex items-center w-full text-xxs mt-2 align-middle mb-4 leading-tight text-gray-600"><span class="overflow-hidden text-ellipsis whitespace-nowrap">
                                        <?= $jariyah['brand'] ?>
                                    </span>
                                    <div class="ml-1">
                                        <svg class="h-2 w-2" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                            <path d="M6 0C2.691 0 0 2.691 0 6s2.691 6 6 6 6-2.691 6-6-2.691-6-6-6z" fill="#0085FF"></path>
                                            <path d="M8.85 4.442L5.531 7.654a.518.518 0 01-.722 0L3.15 6.048a.482.482 0 010-.699.522.522 0 01.723 0L5.17 6.606l2.958-2.863a.522.522 0 01.722 0c.2.194.2.506 0 .7z" fill="#FAFAFA"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <div class="bg-gray-200 w-full h-1 mb-2 rounded overflow-hidden ">
                                        <div class="h-1 max-w-full bg-orange-500"></div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="text-sm font-semibold whitespace-no-wrap">Rp <?= $jariyah['total_donation'] ?></div>
                                            <div class="text-xs text-gray-600">Donasi Terkumpul</div>
                                        </div>
                                        <div class="text-right text-gray-600">
                                            <div class="text-xs"><?= $jariyah['expired'] ?> Lagi</div>
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