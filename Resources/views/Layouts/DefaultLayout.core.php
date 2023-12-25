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
        </script>
    </body>

    </html>