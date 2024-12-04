<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(Category $category) { //переменную называем так же как в web.php '/{category}'
        //ларавел автоматический найдет категорию с указанным нами id в переменной $category
        return view('admin.categories.show', compact('category'));
    }
}
