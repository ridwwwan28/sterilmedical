<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\HomeSetting;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index(): View
    {
        $heroSlides = HeroSlide::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $homeSetting = HomeSetting::first();

        $featuredProducts = Product::with('category.group')
            ->where('is_featured', true)
            ->take(4)
            ->get();

        $pageTitle = 'Steril Medical Indonesia - Solution for Medical Disposable Products';
        $metaDescription = 'Steril Medical Indonesia menyediakan berbagai produk medis steril habis pakai berkualitas tinggi untuk rumah sakit, klinik, dan tenaga kesehatan.';

        return view('index', compact('heroSlides', 'homeSetting', 'featuredProducts', 'pageTitle', 'metaDescription'));
    }
}
