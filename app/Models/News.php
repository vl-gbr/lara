<?php

namespace App\Models;

/**
 * Description of News
 *
 * @author vlenx
 */
class News {
    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас есть новость 1, очень хорошая!',
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А новость 2, такое..',
        ]
    ];
    
    public static function getNews() {
        foreach (static::$news as $idx=>$one) {
            static::$news[$idx]['slug'] = \Illuminate\Support\Str::slug($one['title']);
//            dd($one);
        }
//        dd(static::$news);
        return static::$news;
    }
    
    public static function getId($id) {
        foreach (static::getNews() as $item) {
            if ($item['id'] == $id) return $item;;
        }
        return [];
    }
}
