<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    public function getProduct($slug)
    {


        $product = Product::where('slug', $slug)->first();

        // Previous product
        $previousProduct = Product::where('id', '<', $product->id)->first();
        // Next product
        $nextProduct = Product::where('id', '>', $product->id)->first();

        $categories = $product->categories()->get()->pluck('id')->toArray();
        // Related products
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('categories.id', $categories);
        })->whereNotIn('name', [$product->name])->take(10)->get();
        $latestProducts = Product::orderby('id', 'DESC')->take(5)->get();
        $cats = $product->categories()->take(5)->get();


        return view('single-product.single-product', compact('product', 'relatedProducts', 'previousProduct', 'nextProduct', 'cats', 'latestProducts'));
    }

    public function getProduct2($id)
    {

        $product = Product::where('id', $id)->first();

        // Previous product
        $previousProduct = Product::where('id', '<', $product->id)->first();
        // Next product
        $nextProduct = Product::where('id', '>', $product->id)->first();

        $categories = $product->categories()->get()->pluck('id')->toArray();
        // Related products
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('categories.id', $categories);
        })->whereNotIn('name', [$product->name])->take(10)->get();
        $cats = $product->categories()->take(5)->get();

        return view('single-product.single-product', compact('product', 'relatedProducts', 'previousProduct', 'nextProduct', 'cats'));
    }

    public function getShop(Request $request)
    {
        $childProduct = Category::where('parent_id', '=', '0')->take(10)->get();

        return view('pages.templates.shop', compact('childProduct'));
    }

    public function getQuickView(Request $request)
    {
        $productId = $request->input('product');
        $product = Product::findOrFail($productId);

        return view('partials.product-quick-view', compact('product'));
    }

    public function dealOfTheDayToCart($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $message = "";
        if ($product->is_deal_of_day) {
            $deal_expire_date = Carbon::parse($product->deal_expire)->format('Y-m-d');
            $date = new Carbon;
            if ($date < $deal_expire_date) {
                // Previous product
                $previousProduct = Product::where('id', '<', $product->id)->first();
                // Next product
                $nextProduct = Product::where('id', '>', $product->id)->first();

                $categories = $product->categories()->get()->pluck('id')->toArray();
                // Related products
                $relatedProducts = Product::whereHas('categories', function ($query) use ($categories) {
                    $query->whereIn('categories.id', $categories);
                })->whereNotIn('name', [$product->name])->take(10)->get();
                $latestProducts = Product::orderby('id', 'DESC')->take(5)->get();
                $cats = $product->categories()->take(5)->get();


                return view('single-product.single-product', compact('product', 'relatedProducts', 'previousProduct', 'nextProduct', 'cats', 'latestProducts'));

            }else{
                $product->is_deal_of_day = false;
                $product->save();
                return abort(404);
            }
        }else{
            return abort(404);
        }



    }

}
