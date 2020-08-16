<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Core\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        // echo 'test';
    	$products = Product::all();
     //    echo $products;
    	// echo '<pre>';
    	// echo print_r($products);
    	// echo '</pre>';die;
    }
}
