<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Core\Controller;

class ProductController extends Controller
{
    public function index()
    {
    	// echo __METHOD__;
    	$products = Product::where('id', 1)->get();
        echo '<pre>';
        echo print_r($products);
        echo '</pre>';
    }

    public function show() {
    	echo __METHOD__;
    }
}
