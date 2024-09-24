<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediasocial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icons',
        'is_active'
    ];
    protected $table = 'mediasosials';

    //relation to franchisesmedsos
    public function franchisemedsos(){
        return $this->hasMany(Franchisemedso::class, 'medsos_id', 'id');
    }
}
