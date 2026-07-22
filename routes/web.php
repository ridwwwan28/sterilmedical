<?php

use \App\Models\BrandStory;
use \App\Models\HeroSlide;
use \App\Models\HomeSetting;
use \App\Models\Product;
use \App\Models\ProductCategory;
use \App\Models\ProductPageSetting;
use Illuminate\Support\Facades\Route;







Route::get('/', function () {
    $heroSlides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();
    $homeSetting = HomeSetting::first();
    $featuredProducts = Product::with('category.group')->where('is_featured', true)->take(4)->get();

    return view('index', compact('heroSlides', 'homeSetting', 'featuredProducts'));
});

Route::get('/cerita-merk', function () {
    $brandStory = BrandStory::first() ?? new \App\Models\BrandStory();
    return view('brand-story', compact('brandStory'));
});

Route::get('/produk', function (\Illuminate\Http\Request $request) {
    $setting = ProductPageSetting::first() ?? new \App\Models\ProductPageSetting([
        'header_title' => 'Lorem ipsum dolor sit amet.',
        'header_description' => 'Lorem ipsum dolor sit amet.'
    ]);

    $groups = \App\Models\ProductGroup::all();
    $query = \App\Models\Product::query()->with('category.group');

    // 1. Filter Pencarian (Search)
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // 2. Filter Utama (Group)
    if ($request->filled('group') && $request->group !== 'all') {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('product_group_id', $request->group);
        });

        // 3. Filter Kategori (hanya muncul jika Filter Utama dipilih)
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('product_category_id', $request->category);
        }

        $availableCategories = ProductCategory::where('product_group_id', $request->group)->get();
    } else {
        $availableCategories = collect();
    }

    $products = $query->paginate(6)->withQueryString();

    return view('products', compact('products', 'setting', 'groups', 'availableCategories'));
});

Route::get('/produk/{slug}', function ($slug) {
    $product = \App\Models\Product::with('category.group')->where('slug', $slug)->firstOrFail();
    $relatedProducts = \App\Models\Product::with('category.group')
        ->where('slug', '!=', $slug)
        ->where('product_category_id', $product->product_category_id)
        ->inRandomOrder()
        ->take(3)
        ->get();
    return view('product-detail', compact('product', 'relatedProducts'));
})->name('products.detail');

Route::get('/kualitas', function () {
    $quality = \App\Models\Quality::first() ?? new \App\Models\Quality();
    return view('quality', compact('quality'));
});

Route::get('/hubungi-kami', function () {
    return view('contact-us');
});

Route::get('/layout', function () {
    return view('layout');
});
