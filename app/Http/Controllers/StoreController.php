<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
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

    public function productsCategory($id) {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::byCategory($id)->get();

        return view('store.products_category', compact('categories', 'category', 'products'));
    }

}
