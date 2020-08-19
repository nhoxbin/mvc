<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Category;
use Core\Controller;

class ProductController extends Controller
{
    public function index()
    {
    	// echo __METHOD__;
    	$products = Category::all();
        return view('home.products.index', compact('products'));
    }

    public function show() {
    	echo __METHOD__;
    }
}
