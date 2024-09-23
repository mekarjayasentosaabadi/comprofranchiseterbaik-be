<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'title',
        'description',
        'thumbnail',
        'prices',
        'discount',
        'contact',
        'is_menu',
        'is_active'
    ];
    protected $table = 'franchises';

    // relation to franchisemedso
    public function franchisemedsos(){
        return $this->hasMany(Franchisemedso::class, 'franchises_id', 'id');
    }
}
