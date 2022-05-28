<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

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
    public function catBy(News $news, Category $cat,...$opt) {
        //dump('catBy', $news, $cat::$cats, $opt);

        if (!is_array($opt)) {
            $opt = [...$opt];
        }
        if (count($opt) == 2) {
            list($fdx, $val) = $opt;
        } elseif (count($opt) == 1) {
            list($val) = $opt;
            $fdx = 'slug';
        }
        //dd('is array', $fdx, $val, $cat->getCategoryBySlug($val));
        $cdx = $cat->getCategoryBySlug($val);
        //dump('$cdx', $cdx);

        return view('news.index')->with('news', $news->getBy(['category', $cdx['id']]));
    }

    public function cats() {
        $cats = Category::getAll();    //(2)
//        dd($cats);
        return view('categories.cats')->with('categories', $cats);
    }
}
