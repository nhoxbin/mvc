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
    		'products' => $products
    	];
        return $this->view('products.index', $data);
    }

    public function show() {
    	echo __METHOD__;
    }
}
