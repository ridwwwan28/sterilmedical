@props(['heroSlides'])

<section id="hero" class="relative w-full h-[50vh] md:h-[60vh] lg:h-screen overflow-hidden bg-blue-950" x-data="{
    activeSlide: 0,
    slidesCount: {{ count($heroSlides) > 0 ? count($heroSlides) : 1 }},
    timer: null,
    init() {
        if (this.slidesCount > 1) {
            this.timer = setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
            }, 5000);
        }
    }
}">

    @if (count($heroSlides) > 0)
        @foreach ($heroSlides as $index => $slide)
            @php
                $slideImg = $slide->image;
                if (\Illuminate\Support\Str::startsWith($slideImg, ['http://', 'https://'])) {
                    $slideImgUrl = $slideImg;
                } elseif ($slideImg && \Illuminate\Support\Facades\Storage::disk('public')->exists($slideImg)) {
                    $slideImgUrl = asset('storage/' . $slideImg);
                } else {
                    $slideImgUrl = asset($slideImg ?? 'img/hero/hero.jpg');
                }
            @endphp
            <div x-show="activeSlide === {{ $index }}" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-700" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" class="absolute inset-0 w-full h-full flex items-center">

                <!-- Background Image -->
                <div class="absolute inset-0 z-0">
                    <img src="{{ $slideImgUrl }}" alt="Hero Slide {{ $index + 1 }}"
                        class="w-full h-full object-cover object-center">
                </div>
            </div>
        @endforeach
    @else
        <!-- Fallback Static Hero Slide -->
        <div class="absolute inset-0 w-full h-full flex items-center">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('img/hero/hero.jpg') }}" alt="Steril Medical Banner"
                    class="w-full h-full object-cover object-right lg:object-center opacity-80">
            </div>
        </div>
    @endif

    <!-- Slider Navigation Controls -->
    @if (count($heroSlides) > 1)
        <!-- Prev & Next Buttons -->
        <button @click="activeSlide = (activeSlide - 1 + slidesCount) % slidesCount"
            aria-label="Previous Slide"
            class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 z-30 p-2 md:p-3 rounded-full bg-black/20 hover:bg-black/40 text-white backdrop-blur-xs transition-colors focus:outline-none">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button @click="activeSlide = (activeSlide + 1) % slidesCount"
            aria-label="Next Slide"
            class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 z-30 p-2 md:p-3 rounded-full bg-black/20 hover:bg-black/40 text-white backdrop-blur-xs transition-colors focus:outline-none">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Indicators (Dots) -->
        <div class="absolute bottom-6 inset-x-0 z-30 flex justify-center gap-3">
            <template x-for="(slide, index) in slidesCount" :key="index">
                <button @click="activeSlide = index"
                    :aria-label="'Go to slide ' + (index + 1)"
                    :class="activeSlide === index ? 'w-8 bg-blue-500' : 'w-2.5 bg-white/50 hover:bg-white/80'"
                    class="h-2.5 rounded-full transition-all duration-300 focus:outline-none">
                </button>
            </template>
        </div>
    @endif

    <div class="absolute inset-x-0 bottom-0 h-24 bg-linear-to-t from-blue-50 via-blue-50/50 to-transparent z-10 pointer-events-none"></div>
</section>
