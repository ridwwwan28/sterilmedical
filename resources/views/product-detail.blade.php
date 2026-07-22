@extends('layout')

@section('konten')
    <div class="relative min-h-screen w-full bg-blue-50 pt-24 lg:pt-28 pb-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Product Showcase Box -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden mb-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 p-6 sm:p-8 lg:p-12">

                    <!-- Left: Product Image -->
                    <div class="flex flex-col space-y-4">
                        <div
                            class="relative w-full aspect-square bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-center overflow-hidden group">
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
                            <img src="{{ $prodImgUrl }}" alt="{{ $product->name }}"
                                class="object-cover w-full h-full group-hover:scale-102 transition-transform duration-500">

                            <!-- Category Float Badge -->
                            <div
                                class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-full shadow-md">
                                {{ $product->category->name ?? '' }}
                            </div>
                        </div>
                    </div>

                    <!-- Right: Product Information -->
                    <div class="flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-2 mb-2 flex-wrap">
                                @if($product->is_featured)
                                    <span class="inline-flex items-center gap-1 text-xs font-black uppercase tracking-wider text-amber-950 bg-amber-400 px-3 py-0.5 rounded-full shadow-xs border border-amber-300">
                                        <svg class="w-3.5 h-3.5 fill-current text-amber-950" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                        Produk Unggulan
                                    </span>
                                @endif
                                @if($product->category && $product->category->group)
                                    <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">
                                        {{ $product->category->group->name }}
                                    </span>
                                @endif
                                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2.5 py-0.5 rounded-full">
                                    {{ $product->category->name ?? '' }}
                                </span>
                            </div>
                            <h1 class="text-3xl lg:text-4xl font-extrabold text-blue-950 leading-tight mb-4">
                                {{ $product->name }}
                            </h1>

                            <hr class="border-gray-100 my-6">

                            <!-- Description -->
                            <div class="mb-8">
                                <h3 class="text-lg font-bold text-blue-950 mb-3">Deskripsi Produk</h3>
                                <p class="text-gray-600 leading-relaxed text-base">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <!-- Specifications -->
                            <div class="mb-8">
                                <h3 class="text-lg font-bold text-blue-950 mb-4">Spesifikasi Teknis</h3>
                                @if(!empty($product->specifications) && is_array($product->specifications))
                                    <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-xs">
                                        <table class="w-full text-left border-collapse text-sm">
                                            <tbody>
                                                @foreach ($product->specifications as $key => $val)
                                                    <tr
                                                        class="odd:bg-white even:bg-gray-50/50 border-b border-gray-100 last:border-0">
                                                        <td
                                                            class="px-4 py-3.5 font-bold text-blue-950/80 w-1/3 border-r border-gray-100 bg-gray-50/30">
                                                            {{ $key }}
                                                        </td>
                                                        <td class="px-4 py-3.5 text-gray-600">
                                                            {{ $val }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-gray-500 italic text-sm">Tidak ada spesifikasi teknis.</p>
                                @endif
                            </div>
                        </div>

                        <!-- CTA Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-6 pt-6 border-t border-gray-100">
                            <!-- WhatsApp CTA -->
                            <a href="https://wa.me/6281286933933?text=Halo%20Steril%20Medical%20Indonesia,%20saya%20tertarik%20dengan%20produk%20*{{ urlencode($product->name) }}*.%20Bisa%20berikan%20informasi%20lebih%20lanjut%20atau%20katalognya?"
                                target="_blank"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-bold rounded-2xl shadow-lg hover:shadow-emerald-600/20 hover:-translate-y-0.5 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-phone-call">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81 7A2 2 0 0 1 22 16.92z" />
                                    <path d="M14.05 2a9 9 0 0 1 8 7.94" />
                                    <path d="M14.05 6A5 5 0 0 1 18 10" />
                                </svg>
                                Tanya Via WhatsApp
                            </a>

                            <!-- Back to Products -->
                            <a href="/produk"
                                class="inline-flex items-center justify-center gap-2 px-6 py-4 bg-white hover:bg-gray-50 active:bg-gray-100 text-blue-950 font-bold rounded-2xl border border-gray-200 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-arrow-left">
                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                    <polyline points="12 19 5 12 12 5"></polyline>
                                </svg>
                                Kembali ke Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            @if(isset($relatedProducts) && $relatedProducts->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-extrabold text-blue-950 mb-6">Produk Terkait</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($relatedProducts as $rel)
                            <a href="{{ route('products.detail', $rel->slug) }}"
                                class="flex flex-col bg-white rounded-3xl p-5 border border-gray-100 shadow-xs hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 group">
                                <div
                                    class="w-full aspect-square overflow-hidden rounded-xl bg-gray-50 flex items-center justify-center mb-4">
                                    @php
                                        $relImg = $rel->image;
                                        if (\Illuminate\Support\Str::startsWith($relImg, ['http://', 'https://'])) {
                                            $relImgUrl = $relImg;
                                        } elseif ($relImg && \Illuminate\Support\Facades\Storage::disk('public')->exists($relImg)) {
                                            $relImgUrl = asset('storage/' . $relImg);
                                        } else {
                                            $relImgUrl = asset($relImg ?? 'img/products/produk_1.jpg');
                                        }
                                    @endphp
                                    <img src="{{ $relImgUrl }}" alt="{{ $rel->name }}"
                                        class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <span
                                    class="text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full self-start mb-2">
                                    {{ $rel->category->name ?? '' }}
                                </span>
                                <h3
                                    class="font-extrabold text-blue-950 group-hover:text-blue-700 transition-colors duration-200 line-clamp-1">
                                    {{ $rel->name }}
                                </h3>
                                <p class="text-xs text-gray-500 line-clamp-2 mt-1 leading-relaxed">
                                    {{ $rel->description }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
