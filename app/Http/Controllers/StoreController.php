<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function index() {
        $categories = Category::all();
        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommended()->get();

        return view('store.index', compact('categories','pFeatured','pRecommended'));
    }

    public function category($id) {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::byCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($id) {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));
    }

    public function tag($id) {
        $categories = Category::all();
        $tag = Tag::find($id);

        return view('store.tag', compact('categories', 'tag'));
    }

}
