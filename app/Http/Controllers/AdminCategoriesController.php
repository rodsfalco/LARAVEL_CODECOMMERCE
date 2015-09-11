<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $c) {
        $this->categories = $c;
    }

    public function index()
    {
        $categories = $this->categories->all();

        return view('categories', compact('categories'));
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
