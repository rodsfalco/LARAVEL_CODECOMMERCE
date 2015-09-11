<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $p) {
        $this->products = $p;
    }

    public function index()
    {
        $products = $this->products->all();

        return view('products', compact('products'));
    }

    public function create()
    {
        return "CREATE";
    }

    public function read($id)
    {
        return "READ ".$id;
    }

    public function update($id)
    {
        return "UPDATE ".$id;
    }

    public function delete($id)
    {
        return "DELETE ".$id;
    }
}
