<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'articles';
    //relation to articletags

    public function articletag()
    {
        return $this->hasMany(Articletag::class, 'article_id', 'id');
    }
}
