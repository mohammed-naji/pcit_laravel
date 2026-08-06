<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // SELECT * FROM categories

        // $latest_products = Product::orderBy('id', 'desc')->limit(10)->get();
        // SELECT * FROM products ORDER BY id DESC LIMIT 10

        return 'Homepage from Controller';
    }

    public function about()
    {
        return 'About Us from Controller';
    }
}
