<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'tags';

    //relation to articletags
    public function articletag()
    {
        return $this->hasMany(Articletag::class, 'tag_id', 'id');
    }
}
