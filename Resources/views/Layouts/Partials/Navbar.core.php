<!-- Navbar -->
<nav id="main-navbar" class="bg-white dark:bg-gray-900 fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-sm flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="http://inisiatifkebaikan.org" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="/public/assets/images/logos/base-logo.png" class="w-24" alt="Flowbite Logo" />
        </a>
        <div class="flex md:order-2 items-center relative">
            <div class="relative flex items-center">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fa-solid fa-magnifying-glass text-orange-500"></i>
                </span>
                <input type="text" id="navbar-search-input" disabled class="cursor-pointer rounded-2xl py-2 px-10 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-blue-500 transition duration-300">
            </div>
        </div>
    </div>
</nav>
<script>
    const input = document.querySelector('#navbar-search-input');
    const placeholderTexts = ["Cari program kebaikan ...", "Sedekah kebaikan ..."];
    let currentIndex = 0;

    function startTypingEffect() {
        input.placeholder = placeholderTexts[currentIndex];
        currentIndex = (currentIndex + 1) % placeholderTexts.length;
    }

    startTypingEffect();
    setInterval(startTypingEffect, 2000);
</script>
<!-- End of navbar -->