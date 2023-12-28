<style>
    @media (orientation: portrait) {
        #main-navbar {
            /* Gaya khusus untuk orientasi potret */
            /* Misalnya, mengurangi lebar atau menyesuaikan margin */
        }
    }

    @media (orientation: landscape) {
        #main-navbar {}
    }
</style>

<nav id="main-navbar" class="relative xl:w-full lg:w-full sm:w-80 top-6 bottom-0 w-screen lg:left-0 -left-4 lg:mt-2 xl:-mt-6 md:-mt-5 -mt-8 z-50 bg-transparent">
    <div class="flex items-center justify-center py-4">
        <a href="http://inisiatifkebaikan.org" class="lg:-ml-2 ml-5">
            <img src="/public/assets/images/logos/base-logo.png" class="w-24" alt="Flowbite Logo" />
        </a>
        <div class="flex md:order-2 items-center relative mt-2">
            <div class="relative flex items-center">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                    <i data-feather="search" class="text-orange-500 xl:text-lg lg:text-lg md:text-lg sm:text-sm"></i>
                </span>
                <input type="text" id="navbar-search-input" disabled class="cursor-pointer h-8 rounded-4xl py-2 px-10 text-gray-400 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-blue-500 transition duration-300">
            </div>
        </div>
    </div>
</nav>