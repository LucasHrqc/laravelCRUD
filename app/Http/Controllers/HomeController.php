<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Queue\Failed\PrunableFailedJobProvider;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', [
            'products' => $products
        ]);
    }
}
