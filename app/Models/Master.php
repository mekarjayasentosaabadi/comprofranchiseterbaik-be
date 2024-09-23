<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = [
        'titleheader',
        'descriptionheader',
        'thumbnailheader',
        'titlefooter',
        'descriptionfooter',
        'address',
        'phone_number',
        'whatsapp_number',
    ];
    protected $table = 'masters';
}
