<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        return view('main.index'); //метод view смотрит начиная с папки view и вместо / ставится '.'
    }
}
