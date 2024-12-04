<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    // это трейт (дополнение к классу)
    // - определенный функционал прописанный и подключаемый в файл чтобы не копировать его

    protected $table = 'categories';
    protected $guarded = false;
}
