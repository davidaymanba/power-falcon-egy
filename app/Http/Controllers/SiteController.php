<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('site.home', [
            'featuredProducts' => Product::query()->with('category')->latest()->take(8)->get(),
            'categories' => Category::query()->withCount('products')->orderBy('name_en')->take(6)->get(),
        ]);
    }

    public function about(): View
    {
        return view('site.about');
    }

    public function products(Request $request): View
    {
        $products = Product::query()
            ->with('category')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->toString();

                $query->where(function ($query) use ($search) {
                    $query->where('name_en', 'like', "%{$search}%")
                        ->orWhere('name_ar', 'like', "%{$search}%")
                        ->orWhere('description_en', 'like', "%{$search}%")
                        ->orWhere('description_ar', 'like', "%{$search}%")
                        ->orWhereHas('category', function ($query) use ($search) {
                            $query->where('name_en', 'like', "%{$search}%")
                                ->orWhere('name_ar', 'like', "%{$search}%");
                        });
                });
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', fn ($query) => $query->where('slug', $request->string('category')->toString()));
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('site.products', [
            'products' => $products,
            'categories' => Category::query()->withCount('products')->orderBy('name_en')->get(),
            'activeCategory' => $request->string('category')->toString(),
        ]);
    }

    public function contact(): View
    {
        return view('site.contact');
    }
}
