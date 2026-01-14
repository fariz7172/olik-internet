<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display the specified promo page.
     */
    public function show($slug)
    {
        $promo = Carousel::where('slug', $slug)->active()->firstOrFail();
        
        return view('promo.show', compact('promo'));
    }
}
