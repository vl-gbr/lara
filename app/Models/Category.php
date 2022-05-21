<?php

namespace App\Models;

/**
 * Description of Category
 *
 * @author vlenx
 */
class Category {
    private static $cats = [
        [
            'id' => 1,
            'title' => 'Категория 1',
            'text' => 'Категория 1 -- Новости политики',
        ],
        [
            'id' => 2,
            'title' => 'Категория 2',
            'text' => 'Категория 2 -- Новости спорта',
        ]
    ];
    
    public static function getNews() {
        foreach (static::$cats as $idx=>$one) {
            static::$cats[$idx]['slug'] = \Illuminate\Support\Str::slug($one['title']);
//            dd($one);
        }
//        dd(static::$cats);
        return static::$cats;
    }
    
    public static function getId($id) {
        foreach (static::getNews() as $item) {
            if ($item['id'] == $id) return $item;
        }
        return [];
    }
}