<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    public function index() {
        $products = $this->productModel->paginate(7);

        return view('products.index', compact('products'));
    }

    public function create(Category $category) {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request) {
        $input = $request->all();

        $product = $this->productModel->fill($input);
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id, Category $category) {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id) {
        $this->productModel->find($id)->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy($id) {
        $this->productModel->find($id)->delete();

        return redirect()->route('products.index');
    }

    public function images($id) {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id) {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImage $productImage) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage->create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('local_public')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id'=>$id]);
    }

}
