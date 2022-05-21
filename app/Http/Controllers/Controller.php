<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getNews(): array {
        $faker = Factory::create('ru_RU');
        $data = [];
        $lastCount = 20;
//        $lastCount = mt_rand(6, 20);
        for ($i=0; $i<$lastCount; $i++) {
            $data [] = [
                'id' => $i,
                'title' => $faker->catchPhrase(4),
                'description' => $faker->sentence(8),
                'author' => $faker->name(),
//                'slug' => \Illuminate\Support\Str::slug($data[$i]['title']),
                'created_at' => now(),
            ];
            $data[$i]['slug'] = \Illuminate\Support\Str::slug($data[$i]['title']);
//            dd($data);
        }
        return $data;
    }
}
