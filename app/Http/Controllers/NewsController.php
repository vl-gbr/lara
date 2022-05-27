<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(News $news) {
//        $news = new News();    
//        dd($news);
        return view('news.index')->with('news', $news->getAll());
    }
    
    public function show(News $news, $id) {
//        $news = new News(); 
        return view('news.page', ['page'=> $news->getId($id)]);  
    }
    public function list(News $news, $id=null) {
//        $news = new News(); 
//        dd($news);
        return view('news.index')->with('news', $news->getAll($id));
    }
    public function newsBy(News $news, ...$opt) {
//        $news = new News(); 
        dump($news, $opt);
        return view('news.index')->with('news', $news->getBy($opt));
    }
}
