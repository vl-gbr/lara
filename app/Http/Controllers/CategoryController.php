<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $cats = Category::getAll();    //(2)
//        dd($cats);
        return view('categories.index')->with('categories', $cats);
    }
    
    public function show($id) {
        return view('categories.page', ['page'=> Category::getId($id)]);  //(3)
    }
}
