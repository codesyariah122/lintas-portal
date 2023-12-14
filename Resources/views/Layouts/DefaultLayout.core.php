<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://inisiatifkebaikan.org/public/assets/images/logos/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="http://inisiatifkebaikan.org/public/assets/images/logos/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        #carousel-indicators button {
            width: 13px;
            height: 13px;
            background-color: rgba(228, 228, 228, 0.8);
            opacity: 90%;
            margin-top: -3rem;
        }

        #carousel-indicators button.active {
            width: 15px;
            height: 15px;
            background-color: rgba(255, 118, 0, 0.9);
        }

        #main-navbar {
            transition: #4b535b 0.3s, box-shadow 0.3s;
        }

        #main-navbar.scrolled {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
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
        }

        /* Tambahkan ini pada bagian CSS Anda */
        #navbar-search-input {
            width: 200px !important;
            /* Sesuaikan lebar input sesuai kebutuhan */
            border: none;
            border-radius: 8px;
            padding: 8px 28px 8px 12px;
            /* Sesuaikan padding sesuai kebutuhan */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Tambahkan box shadow di bagian bawah */
            margin-left: -10rem;
        }

        /* Efek typing */
        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        #navbar-search-input::placeholder {
            opacity: 20%;
        }

        #navbar-search-input.typing::placeholder {
            opacity: 1;
            animation: typing 2s steps(15, end) infinite alternate;
        }

        /* Gaya untuk ikon */
        #navbar-search-input+span {
            position: absolute;
            top: 50%;
            left: 8px;
            transform: translateY(-50%);
            font-size: 1.25rem;
            /* Sesuaikan ukuran ikon sesuai kebutuhan */
            color: #FF7600;
            /* Sesuaikan warna ikon sesuai kebutuhan */
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Container -->
    <main class="container px-0 mx-auto lg:p-0 p-0 max-w-screen-sm">
        <section id="layout-wrapper" class="p-4 rounded max-w-lg mx-auto">
            <?php foreach ($partials as $partial) : ?>
                <?php require_once "Resources/views/Layouts/" . $partial . ".core.php" ?>
            <?php endforeach; ?>
        </section>

        <!-- Contents -->
        <section id="content-wrapper" class="p-4 rounded max-w-md mx-auto mb-24 lg:mt-16 mt-12" style='background-color: rgba(255, 118, 0, 0.1); background-image: url(""); background-size: 100%;'>
            <?php echo $contents; ?>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            activeSlide(0);
        });
        const activeSlide = (slide) => {
            const buttons = $('#carousel-indicators').find('button');

            // Hapus kelas active dari semua button
            buttons.removeClass('active');

            // Tambahkan kelas active ke button yang sesuai dengan slide yang diklik
            buttons.eq(slide).addClass('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            let navbar = document.getElementById('main-navbar');

            // Tambahkan event listener untuk mendeteksi perubahan scroll
            window.addEventListener('scroll', function() {
                // Tentukan ambang batas scroll untuk mengaktifkan efek
                let scrollThreshold = 50;

                // Jika scroll lebih dari ambang batas, tambahkan kelas 'scrolled'
                if (window.scrollY > scrollThreshold) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>

</body>

</html>