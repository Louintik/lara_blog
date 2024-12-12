<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;

    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
        //Tag::class - Класс модели, с которой устанавливается итоговая связь
        //'post_tags' - Название промежуточной таблицы, через которую осуществляется связь
        //'post_id' - одноименный внешний ключ данной модели (Post) в промежуточной таблице post_tags
        //'tag_id' - Внешний ключ связанной модели (Tag) в промежуточной таблице post_tags
    }
}
