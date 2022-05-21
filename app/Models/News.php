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
            'text' => 'Ситуация в мире',
            'category' => 1,
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Ситуация с вывозом мусора в СПб',
            'category' => 2,
        ],
        [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Зенит - Чемпион!',
            'category' => 3,
        ],
        [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Ситуация на ближнем востоке',
            'category' => 1,
        ],
        [
            'id' => 5,
            'title' => 'Новость 5',
            'text' => 'Об уборке снега на улицах СПб',
            'category' => 2,
        ],
        [
            'id' => 6,
            'title' => 'Новость 6',
            'text' => 'Спортивные секции в новостройках',
            'category' => 3,
        ],
        [
            'id' => 7,
            'title' => 'Новость 7',
            'text' => 'Ситуация на Дальнем востоке',
            'category' => 1,
        ],
        [
            'id' => 8,
            'title' => 'Новость 8',
            'text' => 'Готовность к новому учебному году',
            'category' => 2,
        ],
        [
            'id' => 9,
            'title' => 'Новость 9',
            'text' => 'Олимпийские награды еще будут',
            'category' => 3,
        ],
        [
            'id' => 10,
            'title' => 'Новость 10',
            'text' => 'О грядущих выборах',
            'category' => 1,
        ]
    ];
    
    public static function getNews($id=null) {
//        dd(!empty($id));
        $newsList = [];
        if (!empty($id)) {
            foreach (static::$news as $idx=>$one) {
                if ($one['category'] <> $id) continue;
                $newsList[] = $one;
            }
        } else {
            $newsList = static::$news;
        }
        foreach ($newsList as $idx=>$one) {
            $newsList[$idx]['slug'] = \Illuminate\Support\Str::slug($one['title']);
//            dd($one);
        }
//        dd(static::$news);
//        dd($newsList);
        return $newsList;
    }
    
    public static function getId($id) {
        foreach (static::getNews() as $item) {
            if ($item['id'] == $id) return $item;;
        }
        return [];
    }
}
