<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user) { //переменную называем так же как в web.php '/{user}'
        //ларавел автоматический найдет категорию с указанным нами id в переменной $user
        return view('admin.user.show', compact('user'));
    }
}
