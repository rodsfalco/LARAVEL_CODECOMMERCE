<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $productModel;
    private $tagModel;

    public function __construct(Product $productModel, Tag $tagModel) {
        $this->productModel = $productModel;
        $this->tagModel = $tagModel;
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
        $input = $request->except('tags_prod');

        $product = $this->productModel->fill($input);
        $product->save();

        if($request->has('tag_list')) {
            $this->tagsControl($product, $request->input('tag_list'), true);
        }

        return redirect()->route('products.index');
    }

    public function edit($id, Category $category) {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id) {
        $product = $this->productModel->find($id);
        $product->update($request->except('tags_prod'));

        if($request->has('tag_list')) {
            $this->tagsControl($product, $request->input('tag_list'), false);
        } else if(count($product->tags) > 0) {
            $product->tags()->detach();
        }

        return redirect()->route('products.index');
    }

    /*
     * Faz a inclusão das tags, se necessário, e então adiciona a referência ao produto.
     */
    private function tagsControl($product, $tagList, $isCreate) {
        $tags_array = explode(',', $tagList);
        $ids_array = array();
        foreach($tags_array as $tag) {
            if(!empty(trim($tag))) {
                try {
                    $t = $this->tagModel->where('name', 'like', trim($tag))->firstOrFail();
                } catch (ModelNotFoundException $ex) {
                    $t = $this->tagModel->create(['name' => trim($tag)]);
                }
                array_push($ids_array, $t->id);
            }
        }

        if($isCreate) {
            $product->tags()->attach($ids_array);
        } else {
            $product->tags()->sync($ids_array);
        }
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

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage->create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('local_public')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id) {
        $image = $productImage->find($id);

        if(file_exists(public_path('uploads').'/'.$image->id.'.'.$image->extension)) {
            Storage::disk('local_public')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
    }

}
