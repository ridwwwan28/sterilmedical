<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Dynamic Primary Meta Tags -->
    @php
        $defaultTitle = $websiteSettings?->meta_title ?? 'STERIL MEDICAL';
        $currentTitle = $pageTitle ?? $defaultTitle;
        $defaultDesc = 'Steril Medical menyediakan berbagai produk medis steril habis pakai berkualitas tinggi untuk rumah sakit, klinik, dan tenaga kesehatan.';
        $currentDesc = $metaDescription ?? $defaultDesc;
        $currentOgImage = $ogImage ?? asset('img/hero/hero.jpg');
        $currentUrl = url()->current();
    @endphp

    <title>{{ $currentTitle }}</title>
    <meta name="description" content="{{ $currentDesc }}">
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="{{ $currentTitle }}">
    <meta property="og:description" content="{{ $currentDesc }}">
    <meta property="og:image" content="{{ $currentOgImage }}">
    <meta property="og:site_name" content="Steril Medical">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="{{ $currentTitle }}">
    <meta name="twitter:description" content="{{ $currentDesc }}">
    <meta name="twitter:image" content="{{ $currentOgImage }}">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="scroll-smooth">
    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full top-0 z-50 bg-white lg:bg-transparent">
        <div class="w-full mx-auto px-4 lg:px-0 lg:max-w-6xl">
            <div class="flex justify-between items-center h-15 lg:h-20">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="/" class="flex items-center gap-2 group w-32 lg:w-64 ">
                        @php
                            $logo = $websiteSettings?->logo ?? null;
                            if ($logo) {
                                if (\Illuminate\Support\Str::startsWith($logo, ['http://', 'https://'])) {
                                    $logoUrl = $logo;
                                } elseif (\Illuminate\Support\Facades\Storage::disk('public')->exists($logo)) {
                                    // Use relative path to ensure same-origin request (avoid CORS)
                                    $logoUrl = '/storage/' . ltrim($logo, '/');
                                } else {
                                    $logoUrl = asset('img/logo-danpac.png');
                                }
                            } else {
                                $logoUrl = asset('img/logo-danpac.png');
                            }
                        @endphp
                        <img src="{{ $logoUrl }}" alt="{{ $websiteSettings?->company_name ?? 'Danpac Logo' }}">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex w-full px-40 items-center justify-end lg:space-x-10 text-lg">
                    <a href="/cerita-merk"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 whitespace-nowrap {{ request()->is('cerita-merk*') ? 'border-b-blue-950' : 'border-transparent hover:border-b-blue-950' }}">Cerita
                        Merk</a>
                    <a href="/produk"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 whitespace-nowrap {{ request()->is('produk*') ? 'border-b-blue-950' : 'border-transparent hover:border-b-blue-950' }}">Produk</a>
                    <a href="/kualitas"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 whitespace-nowrap {{ request()->is('kualitas*') ? 'border-b-blue-950' : 'border-transparent hover:border-b-blue-950' }}">Kualitas</a>
                    <a href="/hubungi-kami"
                        class="font-medium text-blue-950 transition-colors pb-1 border-b-2 whitespace-nowrap {{ request()->is('hubungi-kami*') ? 'border-b-blue-950' : 'border-transparent hover:border-b-blue-950' }}">Hubungi
                        Kami</a>
                </div>

                <button id="hamburgerBtn" class="hamburger lg:hidden cursor-pointer focus:outline-none p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                        <path d="M4 5h16" />
                        <path d="M4 12h16" />
                        <path d="M4 19h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu-->
        <div id="mobileMenu" class="hidden lg:hidden">
            <div
                class="absolute flex flex-col bg-white shadow-md inset-x-0 mx-auto px-6 py-5 top-15 border-t border-gray-100">
                <a href="/cerita-merk"
                    class="font-medium transition-colors pb-2 border-b-2 border-transparent {{ request()->is('cerita-merk*') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">Cerita
                    Merk</a>
                <a href="/produk"
                    class="font-medium transition-colors pb-2 border-b-2 border-transparent {{ request()->is('produk*') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">Produk</a>
                <a href="/kualitas"
                    class="font-medium transition-colors pb-2 border-b-2 border-transparent {{ request()->is('kualitas*') ? 'text-blue-700' : 'text-gray-600 hover:text-blue-700' }}">Kualitas</a>
                <a href="/hubungi-kami"
                    class="font-semibold bg-blue-500 rounded-xl text-center py-2 text-white mt-5 hover:bg-blue-700">Hubungi
                    Kami</a>
            </div>
        </div>
    </nav>

    @yield('konten')

    <footer class="bg-blue-950 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-16">
                <div>
                    <h3 class="font-bold italic text-lg mb-4 text-white">Didistribusikan oleh :</h3>
                    <p class="font-bold text-base mb-2">{{ $websiteSettings?->company_name ?? 'PT. DANPAC PHARMA' }}</p>
                    <p class="leading-relaxed text-sm md:text-base">
                        {!! nl2br(
                            e(
                                $websiteSettings?->address ??
                                    'Green Sedayu Biz Park Blok DM5 No 31E, Jl. Daan Mogot KM 18, Kalideres, Jakarta Barat 11840, Indonesia',
                            ),
                        ) !!}
                    </p>
                </div>

                <div>
                    <h3 class="font-bold italic text-lg mb-4 text-white">Link Cepat</h3>
                    <ul class="space-y-3 font-medium">
                        <li><a href="/cerita-merk" class="hover:text-gray-300 hover:underline transition-all">Cerita
                                Merk</a>
                        </li>
                        <li><a href="/produk" class="hover:text-gray-300 hover:underline transition-all">Produk</a>
                        </li>
                        <li><a href="/kualitas" class="hover:text-gray-300 hover:underline transition-all">Kualitas</a>
                        </li>
                        <li><a href="/hubungi-kami" class="hover:text-gray-300 hover:underline transition-all">Hubungi
                                Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold italic text-lg mb-4 text-white">Hubungi Kami</h3>
                    <div class="space-y-4">
                        @if (!empty($websiteSettings?->email))
                            <div class="flex items-center gap-3">
                                <div class="bg-white p-2 rounded-full flex shrink-0 items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-mail text-blue-950">
                                        <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                        <rect x="2" y="4" width="20" height="16" rx="2" />
                                    </svg>
                                </div>
                                <span class="font-medium text-sm md:text-base">{{ $websiteSettings->email }}</span>
                            </div>
                        @endif
                        @php
                            $phoneNumbers = collect(
                                explode("\n", $websiteSettings?->phone_numbers ?? "0812 8693 3933\n021 543 133 55"),
                            )
                                ->map(fn($item) => trim($item))
                                ->filter()
                                ->all();
                        @endphp

                        @foreach ($phoneNumbers as $phone)
                            <div class="flex items-center gap-3">
                                <div class="bg-white p-2 rounded-full flex shrink-0 items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-phone text-blue-950">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </div>
                                <span class="font-medium text-sm md:text-base">{{ $phone }}</span>
                            </div>
                        @endforeach
                        @php
                            $socials = [
                                ['label' => 'Facebook', 'url' => $websiteSettings?->facebook_url, 'icon' => 'f'],
                                ['label' => 'Instagram', 'url' => $websiteSettings?->instagram_url, 'icon' => '📷'],
                                ['label' => 'YouTube', 'url' => $websiteSettings?->youtube_url, 'icon' => '▶'],
                                ['label' => 'LinkedIn', 'url' => $websiteSettings?->linkedin_url, 'icon' => 'in'],
                                ['label' => 'WhatsApp', 'url' => $websiteSettings?->whatsapp_url, 'icon' => '✆'],
                            ];

                            $hasSocial = collect($socials)->pluck('url')->filter()->isNotEmpty();
                        @endphp

                        @if ($hasSocial)
                            <h3 class="font-bold italic text-lg mt-6 mb-2 text-white">Sosial Media</h3>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    @foreach ($socials as $social)
                                        @if (!empty($social['url']))
                                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white text-sm font-semibold text-white transition hover:bg-white/20"
                                                aria-label="{{ $social['label'] }}">
                                                @if ($social['label'] === 'Facebook')
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @elseif ($social['label'] === 'Instagram')
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor" fill-rule="evenodd"
                                                            d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @elseif ($social['label'] === 'YouTube')
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="h-4 w-4" fill="currentColor" aria-hidden="true">
                                                        <circle cx="12" cy="12" r="10" />
                                                    </svg>
                                                @endif
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap items-center justify-center gap-3 border-t border-sky-300 pt-6">
            </div>

            <div class="mt-4 text-center text-sm font-medium opacity-80">
                {{ $websiteSettings?->copyright ?? 'PT. Danpac Pharma' }}
            </div>
        </div>
    </footer>
</body>

</html>
