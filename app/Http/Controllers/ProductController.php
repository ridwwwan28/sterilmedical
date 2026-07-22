<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\ProductPageSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display the product catalog page with filters and search.
     */
    public function index(Request $request): View
    {
        $setting = ProductPageSetting::first() ?? new ProductPageSetting([
            'header_title' => 'Produk Steril Medical',
            'header_description' => 'Jelajahi berbagai pilihan perlengkapan medis steril berkualitas.'
        ]);

        $groups = ProductGroup::all();
        $query = Product::query()->with('category.group');

        // 1. Search Filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // 2. Primary Filter (Product Group)
        if ($request->filled('group') && $request->group !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('product_group_id', $request->group);
            });

            // 3. Sub-category Filter
            if ($request->filled('category') && $request->category !== 'all') {
                $query->where('product_category_id', $request->category);
            }

            $availableCategories = ProductCategory::where('product_group_id', $request->group)->get();
        } else {
            $availableCategories = collect();
        }

        $products = $query->paginate(6)->withQueryString();

        $pageTitle = 'Katalog Produk - Steril Medical Indonesia';
        $metaDescription = Str::limit(strip_tags($setting->header_description ?? 'Katalog produk medis steril habis pakai.'), 150);

        return view('products', compact(
            'products',
            'setting',
            'groups',
            'availableCategories',
            'pageTitle',
            'metaDescription'
        ));
    }

    /**
     * Display a specific product detail page.
     */
    public function show(string $slug): View
    {
        $product = Product::with('category.group')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::with('category.group')
            ->where('slug', '!=', $slug)
            ->where('product_category_id', $product->product_category_id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $pageTitle = $product->name . ' - Steril Medical Indonesia';
        $metaDescription = Str::limit(strip_tags($product->description ?? 'Detail produk ' . $product->name), 150);
        $ogImage = $product->image ? asset('storage/' . $product->image) : asset('img/products/produk_1.jpg');

        return view('product-detail', compact(
            'product',
            'relatedProducts',
            'pageTitle',
            'metaDescription',
            'ogImage'
        ));
    }
}
