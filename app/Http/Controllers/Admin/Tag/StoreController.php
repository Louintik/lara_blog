<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        // firstOrCreate( [по какому ключу происходит проверка ], [если новое значение то какие атрибуты должны появится в бд])
        // firstOrCreate( ['title' => $data['title']],            ['title' => $data['title']])
        // если атрибут проверки и добавления равны можно писать:
        // firstOrCreate([ 'title' => $data['title']])
        // если ключ называется как надо можно сократить до $data

        return redirect()->route('admin.tag.index');
    }
}
