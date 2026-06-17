<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>STERIL MEDICAL INDONESIA</title>
</head>

<body class="scroll-smooth">
    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full top-0 z-50 bg-transparent">
        <div class="max-w-full mx-auto flex justify-center">
            <div class="flex justify-between lg:max-w-4xl lg:justify-center lg:space-x-15 items-center h-15 lg:h-20">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="/" class="flex items-center gap-2 group w-32 lg:w-64 ">
                        <img src="{{ asset('img/logo-danpac.png') }}" alt="Danpac Logo">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center lg:space-x-10 text-lg">
                    <a href="/"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 border-transparent hover:border-b-blue-950 active:border-b-blue-950">Home</a>
                    <a href="/"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 border-transparent hover:border-b-blue-950">Brand
                        Story</a>
                    <a href="/"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 border-transparent hover:border-b-blue-950">Products</a>
                    <a href="/"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 border-transparent hover:border-b-blue-950">Quality</a>
                    <a href="/"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 border-transparent hover:border-b-blue-950">Contact
                        Us</a>
                </div>

                <span class="hamburger lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                        <path d="M4 5h16" />
                        <path d="M4 12h16" />
                        <path d="M4 19h16" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Mobile Menu-->
        <div class="lg:hidden">
            <div class="absolute hidden flex flex-col bg-white shadow-md inset-x-0 mx-auto px-6 py-5 top-15">
                <a href="/"
                    class="font-medium text-gray-600 transition-colors pb-2 border-b-2 border-transparent hover:text-blue-700">Home</a>
                <a href="/"
                    class="font-medium text-gray-600 transition-colors pb-2 border-b-2 border-transparent hover:text-blue-700">Brand
                    Story</a>
                <a href="/"
                    class="font-medium text-gray-600 transition-colors pb-2 border-b-2 border-transparent hover:text-blue-700">Products</a>
                <a href="/"
                    class="font-medium text-gray-600 transition-colors pb-2 border-b-2 border-transparent hover:text-blue-700">Quality</a>
                <a href=""
                    class="font-semibold bg-blue-500 rounded-xl text-center py-2 text-white mt-5 hover:bg-blue-700">Hubungi
                    Kami</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative h-screen w-full flex items-center bg-transparent">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/hero/hero.jpg') }}" alt="Medical Image"
                class="w-full h-full object-cover object-right lg:object-center opacity-80">
        </div>

        <div class="absolute inset-x-0 bottom-0 h-48 bg-linear-to-t from-blue-50 via-white/70 to-transparent z-10">
        </div>

        <div class="relative z-20 w-full max-w-full mx-auto px-4 sm:px-6 lg:px-50 pt-16">
            <div class="max-w-4xl mx-auto">
                <div class="">
                    <img src="{{ asset('img/hero/smi_logo.png') }}" alt="Steril Medical Indonesia" class="w-xl">
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl text-blue-900 font-medium tracking-wide">
                    <span
                        class="text-3xl md:text-4xl lg:text-5xl font-extrabold italic mt-2 block leading-tight text-shadow-lg/20">
                        A Smart Medical Disposable Solution
                    </span>
                </h1>

                <p class="mt-4 text-shadow-lg/20 text-blue-950 font-normal text-sm lg:text-xl">
                    Kami lebih dari sekedar penyedia produk medis, kami membantu meningkatkan kinerja layanan kesehatan
                    dengan solusi cerdas. Kami memastikan untuk mengoptimalkan kinerja para profesional kesehatan,
                    karena kami peduli dengan masa depan dunia yang lebih sehat
                </p>
            </div>
        </div>

        <div class="fixed bottom-8 right-8 z-50">
            <a href="#"
                class="flex items-center justify-center w-12 h-12 bg-blue-900 text-white rounded-md shadow-lg hover:bg-blue-800 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section id="vision-mission" class="relative min-h-screen w-full flex bg-blue-50">
        <div class="max-w-4xl mx-auto px-4 flex flex-col gap-16 mt-10 lg:gap-12">

            <div class="flex flex-col lg:flex-row items-center w-full">
                <div class="w-full lg:w-5/12 z-10">
                    <img src="{{ asset('img/vision-mission/vision.jpg') }}" alt="Steril Medical Vision"
                        class="w-full h-auto object-cover rounded-2xl shadow-lg aspect-video lg:aspect-4/3">
                </div>

                <div
                    class="w-full lg:w-8/12 bg-sky-700 text-white rounded-3xl p-8 lg:p-6 lg:-ml-16 z-0 mt-6 lg:mt-0 shadow-md">
                    <div class="lg:pl-16 text-center lg:text-right">
                        <div class="flex justify-end">
                            <img src="{{ asset('img/vision-mission/smi-negative.png') }}"
                                alt="Steril Medical Indonesia Vision" class="w-60">
                        </div>
                        <h2
                            class="text-2xl sm:text-3xl lg:text-5xl font-bold tracking-wider uppercase mb-4 leading-snug">
                            Brand Vision
                        </h2>
                        <p class="text-base sm:text-lg lg:text-xl font-medium leading-relaxed text-gray-100">
                            Menciptakan dunia yang lebih sehat dengan pengalaman perawatan kesehatan yang cerdas
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse lg:flex-row items-center w-full mt-8 lg:mt-0">
                <div
                    class="w-full lg:w-8/12 bg-sky-700 text-white rounded-3xl p-8 lg:p-6 lg:-mr-16 z-0 mb-6 lg:mb-0 shadow-md">
                    <div class="lg:pr-16 text-center lg:text-left">
                        <div class="flex justify-start">
                            <img src="{{ asset('img/vision-mission/smi-negative.png') }}"
                                alt="Steril Medical Indonesia Vision" class="w-60">
                        </div>
                        <h2
                            class="text-2xl sm:text-3xl lg:text-5xl font-bold tracking-wider uppercase mb-4 leading-snug">
                            Brand Mission
                        </h2>
                        <p class="text-base sm:text-lg lg:text-xl font-medium leading-relaxed text-gray-100">
                            Meningkatkan kesehatan manusia dengan menyediakan produk medis sekali pakai yang unggul
                            untuk mendukung penyedia layanan kesehatan
                        </p>
                    </div>
                </div>

                <div class="w-full lg:w-5/12 z-10">
                    <img src="{{ asset('img/vision-mission/mision.jpg') }}" alt="Steril Medical Mission"
                        class="w-full h-auto object-cover rounded-2xl shadow-lg aspect-video lg:aspect-4/3 bg-white">
                </div>
            </div>
        </div>
    </section>

    <section id="products">

    </section>

    <footer class="bg-sky-200 text-blue-950 py-12 border-t border-sky-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-16">
                <div>
                    <h3 class="font-bold italic text-lg mb-4 text-blue-900">Distributed by :</h3>
                    <p class="font-bold text-base mb-2">PT. DANPAC PHARMA</p>
                    <p class="leading-relaxed text-sm md:text-base">
                        Green Sedayu Biz Park Blok DM5 No 31E,<br>
                        Jl. Daan Mogot KM 18, Kalideres<br>
                        Jakarta Barat 11840<br>
                        Indonesia
                    </p>
                </div>

                <div>
                    <h3 class="font-bold italic text-lg mb-4 text-blue-900">Quick Links</h3>
                    <ul class="space-y-3 font-medium">
                        <li><a href="#" class="hover:text-blue-700 hover:underline transition-all">Brand
                                Story</a></li>
                        <li><a href="#" class="hover:text-blue-700 hover:underline transition-all">Products</a>
                        </li>
                        <li><a href="#" class="hover:text-blue-700 hover:underline transition-all">Quality</a>
                        </li>
                        <li><a href="#" class="hover:text-blue-700 hover:underline transition-all">Contact
                                Us</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold italic text-lg mb-4 text-blue-900">Business Hours</h3>
                    <p class="leading-relaxed text-sm md:text-base mb-6">
                        Senin - Jumat<br>
                        08.30 - 17.30
                    </p>

                    <h3 class="font-bold italic text-lg mb-4 text-blue-900">Contact Us</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-950 p-2 rounded-full flex shrink-0 items-center justify-center">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                    stroke-width="0.00024000000000000003">
                                    <g id="SVGRepo_bgCarrier" stroke-width="2"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z"
                                            fill="#ffffff"></path>
                                    </g>
                                </svg>
                            </div>
                            <span class="font-medium text-sm md:text-base">0812 8693 3933</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="bg-blue-950 p-2 rounded-full flex shrink-0 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-phone text-white">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </div>
                            <span class="font-medium text-sm md:text-base">021 543 133 55</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function() {
            // Jika di-scroll lebih dari 50px dari atas
            if (window.scrollY > 50) {
                // Hapus background transparan
                navbar.classList.remove('bg-transparent');
                // Tambahkan bg-white dengan opacity 80% (bg-white/80)
                // Ditambah backdrop-blur-md dan shadow-sm agar tampilannya lebih rapi (opsional)
                navbar.classList.add('bg-white/80', 'backdrop-blur-md', 'shadow-sm');
            } else {
                // Kembalikan ke posisi awal saat ada di paling atas
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('bg-white/80', 'backdrop-blur-md', 'shadow-sm');
            }
        });
    });
</script>

</html>
