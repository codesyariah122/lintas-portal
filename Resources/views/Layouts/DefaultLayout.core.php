<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://inisiatifkebaikan.org/public/assets/images/logos/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="http://inisiatifkebaikan.org/public/assets/images/logos/favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js "></script>
    <style>
        #popup-modal {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 60;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            width: 100%;
            max-width: 480px; 
            margin: 0 auto;
        }

        .swiper-pagination {
            bottom: 80px!important;
        }
        .swiper-pagination span{
            width: 15px;
            height: 15px;
            background-color: rgba(228, 228, 228, 0.8);
            opacity: 90% !important;
        }

        .swiper-pagination-bullet-active {
            width: 18px !important;
            height: 18px !important;
            background-color: rgba(255, 118, 0, 0.9)!important;
        }

        /*
        .swiper {
            width: 100%;
            height: 100%;
        }

        /* .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            } */

            /* Tambahkan ini pada bagian CSS Anda */
            #navbar-search-input {
                width: 300px !important;
                /* Sesuaikan lebar input sesuai kebutuhan */
                border: none;
                border-radius: 8px;
                padding: 8px 2px 8px 12px;
                /* Sesuaikan padding sesuai kebutuhan */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /* Tambahkan box shadow di bagian bawah */
                margin-left: .2rem;
                text-indent: 25px;
                font-size: 12px;
            }

            /* Responsive styles for smaller devices */
            @media only screen and (max-width: 767px) {
                .modal-content {
                    max-width: 80%;
                }
                .swiper-pagination {
                    bottom: 80px!important;
                }
                .swiper-pagination span{
                    width: 15px;
                    height: 15px;
                    background-color: rgba(228, 228, 228, 0.8);
                    opacity: 90% !important;
                }

                .swiper-pagination-bullet-active {
                    width: 18.5px !important;
                    height: 18.5px !important;
                    background-color: rgba(255, 118, 0, 0.9)!important;
                }
                #navbar-search-input {
                    width: 210px !important;
                    /* Sesuaikan lebar input sesuai kebutuhan */
                    border: none;
                    border-radius: 8px;
                    padding: 8px 28px 8px 12px;
                    /* Sesuaikan padding sesuai kebutuhan */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    /* Tambahkan box shadow di bagian bawah */
                    margin-left: .5rem;
                    text-indent: 13px;
                    font-size: 12px;
                }
            }

            .mySwiper::-webkit-scrollbar {
                width: 12px;
            }

            .mySwiper::-webkit-scrollbar-track {
                background-color: #f1f1f1;
            }

            .mySwiper::-webkit-scrollbar-thumb {
                background-color: #888;
                border-radius: 6px;
            }

            .mySwiper::-webkit-scrollbar-thumb:hover {
                background-color: #555;
            }

        </style>
    </head>

    <body class="bg-white">
        <!-- Container -->
        <main class="container px-0 mx-auto lg:p-0 p-0 max-w-screen-sm">

            <div id="popup-modal" tabindex="-1" class="hidden">
                <div class="modal-content flex p-0 w-full max-w-md max-h-full">
                    <div class="absolute z-60 lg:-left-2 top-20 inset-0 px-0 m-0 sm:mx-auto  w-[380px]">
                        <div class="max-w-[380px] px-0">
                            <div class="relative">
                                <button onclick="closeModal()" data-modal-hide="popup-modal" data-modal-target="popup-modal" type="button" class="w-10 h-10 rounded-full bg-white flex items-center justify-center absolute right-0 top-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <a href="#">
                                    <div class="w-full">
                                        <img src="https://amalsholeh-s3.imgix.net/user-media/ULW4Bw8aNrrx0ex7agyjDprymYoLqVWzQPWMU3MC.png?" class="w-full" alt="" width="534" height="300">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section id="layout-wrapper" class="p-4 rounded max-w-lg mx-auto">
                <?php foreach ($partials as $partial) : ?>
                    <?php require_once "Resources/views/Layouts/" . $partial . ".core.php" ?>
                <?php endforeach; ?>
            </section>

            <!-- Contents -->
            <section id="content-wrapper" class="p-4 rounded-lg max-w-lg overflow-auto mx-auto mb-24 lg:-mt-2 sm:mt-8" style='background-color: rgba(255, 118, 0, 0.1); background-image: url(""); background-size: 100%;'>
                <?php echo $contents; ?>
            </section>
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace();
            const modalElement = $('#popup-modal');

            function closeModal() {
                console.log("Clicked")
                modalElement.hide('slow').fadeOut(1000)
            }
        </script>
    </body>

    </html>