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
    		'page' => 'products.index',
    		'products' => $products
    	];
        return $this->view('layouts.app', $data);
    }

    public function show() {
    	echo __METHOD__;
    }
}
