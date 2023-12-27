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
    <link rel="stylesheet" type="text/css" href="/public/assets/css/public/app.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js "></script>

</head>

<body class="bg-white">
    <!-- Container -->
    <main class="container px-0 mx-auto lg:p-0 p-0 max-w-screen-md">

        <?php foreach ($startup as $start) : ?>
            <?php require_once "Resources/views/Layouts/" . $start . ".core.php"; ?>
        <?php endforeach; ?>

        <section id="layout-wrapper" class="rounded max-w-lg mx-auto">
            <?php foreach ($partials as $partial) : ?>
                <?php require_once "Resources/views/Layouts/" . $partial . ".core.php" ?>
            <?php endforeach; ?>
        </section>

        <!-- Contents -->
        <section id="content-wrapper" class="p-4 rounded-lg max-w-lg overflow-auto mx-auto mb-6 lg:-mt-2 sm:mt-8">
            <?php echo $contents; ?>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="/public/assets/js/public/app.js"></script>
    <script type="text/javascript" src="/public/assets/js/public/load.js"></script>
</body>

</html>