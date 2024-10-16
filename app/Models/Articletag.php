<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articletag extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'articletags';
    //return relation to article
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
    //return relation to tag
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
