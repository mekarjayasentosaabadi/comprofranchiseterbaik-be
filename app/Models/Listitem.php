<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listitem extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'description',
        'icons',
        'is_active'
    ];
    protected $table = 'listitems';
}
