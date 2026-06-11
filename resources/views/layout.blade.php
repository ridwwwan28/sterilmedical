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
    <section id="vision" class="relative h-screen w full flex bg-blue-50">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-50 pt-40">
            <div class="flex bg-green-100">
                <div>
                    <img src="{{ asset('img/vision-mission/vision.jpg') }}" alt="Steril Medical Indonesia Vision"
                        class="w-32 lg:w-80 rounded-xl">
                </div>

                <div class="bg-sky-800 text-end text-white px-5 py-10 rounded-xl">
                    <h2 class="text-6xl uppercase font-semibold pb-6">
                        Brand Vision
                    </h2>
                    <p class="text-2xl">
                        Menciptakan dunia yang lebih sehat dengan pengalaman perawatan kesehatan yang cerdas.
                    </p>
                </div>
            </div>

            <div class="flex bg-green-50">
                <div class="bg-sky-800 text-start text-white px-5 py-10 rounded-xl">
                    <h2 class="text-6xl uppercase font-semibold pb-6">
                        Brand Mission
                    </h2>
                    <p class="text-2xl">
                        Meningkatkan kesehatan manusia dengan menyediakan produk medis sekali pakai yang unggul untuk
                        mendukung penyedia layanan kesehatan
                    </p>
                </div>
                <div>
                    <img src="{{ asset('img/vision-mission/mision.jpg') }}" alt="Steril Medical Indonesia Vision"
                        class="w-32 lg:w-80 rounded-xl">
                </div>
            </div>
        </div>
    </section>
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
