<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of packages.
     */
    public function index(Request $request)
    {
        $query = Package::with('category')->active();

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search by name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $packages = $query->orderBy('sort_order')->paginate(12);
        
        $categories = Category::active()
            ->withCount('packages')
            ->get();

        return view('packages.index', compact('packages', 'categories'));
    }

    /**
     * Display the specified package.
     */
    public function show($slug)
    {
        $package = Package::with('category')
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        $relatedPackages = Package::with('category')
            ->where('category_id', $package->category_id)
            ->where('id', '!=', $package->id)
            ->active()
            ->limit(3)
            ->get();

        return view('packages.show', compact('package', 'relatedPackages'));
    }
}
