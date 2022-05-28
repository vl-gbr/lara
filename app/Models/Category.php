<?php

namespace App\Models;

/**
 * Description of Category
 *
 * @author vlenx
 */
class Category
{
    public static $cats = [
        [
            'id' => 1,
            'title' => 'Категория 1',
            'text' => 'Категория 1 -- Новости политики',
        ],
        [
            'id' => 2,
            'title' => 'Категория 2',
            'text' => 'Категория 2 -- Городские новости',
        ],
        [
            'id' => 3,
            'title' => 'Категория 3',
            'text' => 'Категория 3 -- Новости спорта',
        ]
    ];

    public static function getAll()
    {
        foreach (static::$cats as $idx=>$one) {
            static::$cats[$idx]['slug'] = \Illuminate\Support\Str::slug($one['title']);
        }
        return static::$cats;
    }

    public static function getId($id)
    {
        foreach (static::getAll() as $item) {
            if ($item['id'] == $id) return $item;
        }
        return [];
    }
    public static function getBy($id=null)
    {
        //dump($id);
        $newsList = [];

        switch (true) {

        case !is_array($id):
            //dump('is not array', $id);
            $id = [...$id];
            //dump('is array', $id);

        case is_array($id):
            $arg = [...$id];
            if (count($arg) == 2) {
                list($fdx, $val) = $arg;
            } elseif (count($arg) == 1) {
                list($val) = $arg;
                $fdx = 'slug';
            }
            //dump('is array',$arg, $fdx, $val);
            foreach (static::$cats as $idx=>$one) {
                $one['slug'] = \Illuminate\Support\Str::slug($one['title']);
                //dump($one, $one[$fdx]);
                if ($one[$fdx] <> $val) continue;
                $newsList[] = $one;
            }
            break;
        default:
            $newsList = $this->news;
            break;
        }
        //dump($newsList);
        return $newsList;
    }

    public function getCategoryBySlug($slug) {
        $i = 0;
        //dump('getCategoryBySlug', $slug);
        foreach (static::$cats as $idx=>$one) {
            $one['slug'] = \Illuminate\Support\Str::slug($one['title']);
            //dump(++$i, $one);
            if ($one['slug'] == $slug) return $one;
        }
        return '';
    }
}
