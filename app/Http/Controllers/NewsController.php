<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
//        return "Список новостей"; //(1)
        $news = News::getNews();    //(2)
//        dd($news);
        return view('news.index')->with('news', $news);
    }
    
    public function show($id) {
//        return "Новость -- {$id}"; //(1)
//        foreach (News::getNews() as $page) {  //(2)
//            if ($page['id'] == $id) break;
//        }
        return view('news.page', ['page'=> News::getId($id)]);  //(3)
    }
    public function list($id=null) {
        $news = News::getNews($id);    //(2)
//        dd($news);
        return view('news.index')->with('news', $news);
    }
}
