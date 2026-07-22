<?php

namespace App\Http\Controllers;

use App\Models\BrandStory;
use App\Models\Quality;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Display the Brand Story page.
     */
    public function brandStory(): View
    {
        $brandStory = BrandStory::first() ?? new BrandStory();
        $pageTitle = 'Cerita Merk - Steril Medical Indonesia';
        $metaDescription = 'Pelajari perjalanan dan komitmen kualitas Steril Medical Indonesia dalam menyediakan alat kesehatan steril.';

        return view('brand-story', compact('brandStory', 'pageTitle', 'metaDescription'));
    }

    /**
     * Display the Quality commitment page.
     */
    public function quality(): View
    {
        $quality = Quality::first() ?? new Quality();
        $pageTitle = 'Kualitas - Steril Medical Indonesia';
        $metaDescription = 'Standar kualitas dan sertifikasi internasional produk-produk medis steril dari PT. Danpac Pharma.';

        return view('quality', compact('quality', 'pageTitle', 'metaDescription'));
    }

    /**
     * Display the Contact Us page.
     */
    public function contactUs(): View
    {
        $pageTitle = 'Hubungi Kami - Steril Medical Indonesia';
        $metaDescription = 'Hubungi tim Steril Medical Indonesia untuk informasi ketersediaan produk medis dan kerjasama distribusi.';

        return view('contact-us', compact('pageTitle', 'metaDescription'));
    }
}
