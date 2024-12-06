<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post) { //переменную называем так же как в web.php '/{post}'
        //ларавел автоматический найдет категорию с указанным нами id в переменной $post
        return view('admin.post.show', compact('post'));
    }
}
