<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    // Shows Edit page
    public function edit()
    {

        return view('admin.product_edit');
    }

    // Receives request to edit (PUT)
    public function update()
    {
        return view('admin.product_edit');
    }

    // Shows creating product page
    public function create()
    {

        return view('admin.product_create');
    }

    // Receives the request to create (POST)
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'string|required',
            'price' => 'string|required',
            'stock' => 'string|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|nullable',
        ]);
        $input['slug'] = Str::slug($input['name']);
        Product::create($input);
        return Redirect::route('admin.products');
    }
}
