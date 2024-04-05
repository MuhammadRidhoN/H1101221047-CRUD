<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return response(view('welcome', ['categories' => $categories], ['products' => $products]));
    }
}
