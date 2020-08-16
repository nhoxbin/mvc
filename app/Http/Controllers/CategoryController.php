<?php

class CategoryController extends Controller
{
    public function __construct()
    {
        
    }

    public function index() {
    	$home = 'hello';
    	$cate = Category::all();
    	echo '<pre>';
    	echo print_r($cate);
    	echo '</pre>';die;
    	return view('home.categories.index', compact('home'));
    }
}