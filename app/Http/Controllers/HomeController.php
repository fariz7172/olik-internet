<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        $featuredPackages = Package::with('category')
            ->active()
            ->featured()
            ->orderBy('sort_order')
            ->get();

        $categories = Category::active()
            ->withCount('packages')
            ->get();

        // Hero carousel data
        $heroSlides = \App\Models\Carousel::active()
            ->orderBy('sort_order')
            ->get();

        return view('home.index', compact('featuredPackages', 'categories', 'heroSlides'));
    }
}
