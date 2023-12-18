<!-- Navbar -->
<nav id="main-navbar" class="relative lg:w-full sm:w-80 top-0 bottom-0 w-screen lg:left-0 -left-4 lg:-mt-2 xl:-mt-6 md:-mt-5 -mt-4 z-50 bg-white">
    <div class="max-w-screen-sm container mx-auto flex items-center justify-between p-4">
        <a href="http://inisiatifkebaikan.org" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="/public/assets/images/logos/base-logo.png" class="w-24" alt="Flowbite Logo" />
        </a>
        <div class="flex md:order-2 items-center relative">
            <div class="relative flex items-center">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fa-solid fa-magnifying-glass text-orange-500 lg:text-lg"></i>
                </span>
                <input type="text" id="navbar-search-input" disabled class="cursor-pointer rounded-2xl py-2 px-10 text-gray-400 border border-gray-300 dark:border-gray-700 focus:outline-none focus:border-blue-500 transition duration-300">
            </div>
        </div>
    </div>
</nav>
<!-- End of navbar -->


<script>
    const texts = ["Cari Program Kebaikan ... ", "Beramal Quran ...", "Santri ...", "Sedekah Air ... ", "Inisiatif Kebaikan ...", "Berbagi Makanan ..."];
    let index = 0;
    let textIndex = 0;
    let currentText = "";
    let letter = "";

    function type() {
        if (textIndex === texts[index].length) {
            setTimeout(() => {
                erase();
            }, 2000);
            return;
        }

        currentText = texts[index].substring(0, textIndex + 1);
        letter = currentText.slice(-1);

        document.getElementById("navbar-search-input").value = currentText;
        textIndex++;

        setTimeout(type, 200);
    }

    function erase() {
        if (textIndex === 0) {
            index++;
            if (index === texts.length) {
                index = 0;
            }
            setTimeout(type, 1000);
            return;
        }

        currentText = texts[index].substring(0, textIndex - 1);
        letter = currentText.slice(-1);

        document.getElementById("navbar-search-input").value = currentText;
        textIndex--;

        setTimeout(erase, 100);
    }

    type();
</script>
<!-- End of navbar -->