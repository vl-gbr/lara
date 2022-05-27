<?php

namespace App\Models;

/**
 * Description of News
 *
 * @author vlenx
 */
class News 
{
    private  $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'Ситуация в мире',
            'category' => 1,
            'is_private' => true,
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Ситуация с вывозом мусора в СПб',
            'category' => 2,
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Зенит - Чемпион!',
            'category' => 3,
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Ситуация на ближнем востоке',
            'category' => 1,
        ],
        5 => [
            'id' => 5,
            'title' => 'Новость 5',
            'text' => 'Об уборке снега на улицах СПб',
            'category' => 2,
            'is_private' => true,
        ],
        6 => [
            'id' => 6,
            'title' => 'Новость 6',
            'text' => 'Спортивные секции в новостройках',
            'category' => 3,
        ],
        7 => [
            'id' => 7,
            'title' => 'Новость 7',
            'text' => 'Ситуация на Дальнем востоке',
            'category' => 1,
        ],
        8 => [
            'id' => 8,
            'title' => 'Новость 8',
            'text' => 'Готовность к новому учебному году',
            'category' => 2,
        ],
        9 => [
            'id' => 9,
            'title' => 'Новость 9',
            'text' => 'Олимпийские награды еще будут',
            'category' => 3,
        ],
        10 => [
            'id' => 10,
            'title' => 'Новость 10',
            'text' => 'О грядущих выборах',
            'category' => 1,
        ]
    ];
    
    public function getAll($id=null) 
    {
        $newsList = [];
        
        if (!empty($id)) {
            foreach ($this->news as $idx=>$one) {
                if ($one['category'] <> $id) continue;
                $newsList[] = $one;
            }
        } else {
            $newsList = $this->news;
        }
        foreach ($newsList as $idx=>$one) {
            $newsList[$idx]['slug'] = \Illuminate\Support\Str::slug($one['title']);
        }
            
        return $newsList;
    }
    
    public function getId($id) {
        return $this->getAll()[$id] ?? "";
    }
    
    public function getBy($id=null) 
    {
        dump($id);
        $newsList = [];
        
        switch (true) {
        case empty($id):
            dump('is empty');
            $newsList = $this->news;
            break;
        case is_int($id):
            dump('is integer');
            foreach ($this->news as $idx=>$one) {
                $one['slug'] = \Illuminate\Support\Str::slug($one['title']);
                if ($one['category'] <> $id) continue;
                $newsList[] = $one;
            }
            break;
        case is_string($id):
            dump('is string');
            foreach ($this->news as $idx=>$one) {
                $one['slug'] = \Illuminate\Support\Str::slug($one['title']);
                if ($one['slug'] <> $id) continue;
                $newsList[] = $one;
            }
            break;
        case is_array($id):
            $arg = [...$id];
//            dd($arg);
            if (count($arg) == 2) {
                list($fdx, $val) = $arg;
            } elseif (count($arg) == 1) {
                list($val) = $arg;
                $fdx = 'slug';
            }
            dump('is array', $fdx, $val);
            foreach ($this->news as $idx=>$one) {
                $one['slug'] = \Illuminate\Support\Str::slug($one['title']);
                dump($one, $one[$fdx]);
                if ($one[$fdx] <> $val) continue;
                $newsList[] = $one;
            }
            break;
        default:
            $newsList = $this->news;
            break;
        }
        dump($newsList);
        return $newsList;
    }
}
