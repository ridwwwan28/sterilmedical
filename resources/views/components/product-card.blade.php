@props(['product', 'cardClass' => 'product-item w-full relative flex flex-col bg-white rounded-3xl p-6 transition-all duration-300 border border-gray-100 shadow-xs hover:shadow-2xl hover:-translate-y-1 group'])

@php
    $prodImg = $product->image;
    if (\Illuminate\Support\Str::startsWith($prodImg, ['http://', 'https://'])) {
        $prodImgUrl = $prodImg;
    } elseif ($prodImg && \Illuminate\Support\Facades\Storage::disk('public')->exists($prodImg)) {
        $prodImgUrl = asset('storage/' . $prodImg);
    } else {
        $prodImgUrl = asset($prodImg ?? 'img/products/produk_1.jpg');
    }
@endphp

<a href="{{ route('products.detail', $product->slug) }}"
    data-category="{{ strtolower($product->category->name ?? 'all') }}"
    {{ $attributes->merge(['class' => $cardClass]) }}>
    
    @if($product->is_featured)
        <div class="absolute top-4 right-4 z-10">
            <span class="inline-flex items-center gap-1 bg-amber-400 text-amber-950 font-bold text-[10px] uppercase px-2.5 py-1 rounded-full shadow-md">
                <svg class="w-3 h-3 fill-amber-950" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                Unggulan
            </span>
        </div>
    @endif

    <!-- Image -->
    <div class="relative w-full aspect-square overflow-hidden rounded-2xl bg-gray-50 flex items-center justify-center mb-6">
        <img src="{{ $prodImgUrl }}" alt="{{ $product->name }}"
            class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
    </div>

    <!-- Content -->
    <div class="flex flex-col grow">
        <div class="flex items-center gap-2 mb-3 flex-wrap">
            @if ($product->category && $product->category->group)
                <span class="text-[11px] font-semibold text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">
                    {{ $product->category->group->name }}
                </span>
            @endif
            <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                {{ $product->category->name ?? 'UMUM' }}
            </span>
        </div>

        <h3 class="text-lg font-extrabold text-blue-950 group-hover:text-blue-700 transition-colors duration-300 line-clamp-2">
            {{ $product->name }}
        </h3>

        <p class="mt-2 text-sm text-gray-500 line-clamp-3 leading-relaxed grow">
            {{ $product->description }}
        </p>

        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center text-blue-700 font-bold text-sm gap-1 group-hover:gap-2 transition-all duration-300">
            <span>Lihat Detail</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-arrow-right">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
            </svg>
        </div>
    </div>
</a>
