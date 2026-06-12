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
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between lg:justify-center lg:space-x-20 items-center h-15 lg:h-20">
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
            <div class="max-w-4xl">
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
    <section id="vision" class="relative min-h-screen w-full flex bg-blue-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-16 mt-10 lg:gap-12">

            <div class="flex flex-col lg:flex-row items-center w-full">
                <div class="w-full lg:w-5/12 z-10">
                    <img src="{{ asset('img/vision-mission/vision.jpg') }}" alt="Steril Medical Vision"
                        class="w-full h-auto object-cover rounded-2xl shadow-lg aspect-video lg:aspect-4/3">
                </div>

                <div
                    class="w-full lg:w-8/12 bg-[#7b8baf] text-white rounded-3xl p-8 lg:p-6 lg:-ml-16 z-0 mt-6 lg:mt-0 shadow-md">
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
                    class="w-full lg:w-8/12 bg-[#7b8baf] text-white rounded-3xl p-8 lg:p-6 lg:-mr-16 z-0 mb-6 lg:mb-0 shadow-md">
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

    <footer>
        <div></div>
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
