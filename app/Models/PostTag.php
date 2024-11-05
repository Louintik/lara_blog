<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $table = 'post_tags'; //смотрим на миграцию и называем так как в ней
    protected $guarded = false;
}
