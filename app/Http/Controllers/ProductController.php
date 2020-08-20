<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Core\Controller;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	$data = [
    		'title' => 'Sản phẩm',
    		'page' => 'home.products.index',
    		'products' => $products
    	];
        return view('home.layouts.app', $data);
    }

    public function show() {
    	echo __METHOD__;
    }
}
