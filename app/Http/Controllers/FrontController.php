<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
}
