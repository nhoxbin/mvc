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
            'page' => 'categories.index',
            'categories' => $cate
        ];
        return view('layouts.app', $data);
    }

    public function show() {
        echo __METHOD__;
    }
}