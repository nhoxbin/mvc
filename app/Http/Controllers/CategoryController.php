<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Core\Controller;

class CategoryController extends Controller
{
    public function index() {
    	$cate = Category::all();
    	$data = [
            'title' => 'Danh mục',
            'page' => 'home.categories.index',
            'categories' => $cate
        ];
        return view('home.layouts.app', $data);
    }

    public function show() {
        echo __METHOD__;
    }
}