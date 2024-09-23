<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchisemedso extends Model
{
    use HasFactory;
    protected $fillable = [
        'franchises_id',
        'medsos_id',
        'medsos_name',
    ];
    protected $table = 'franchisemedsos';

    //return relation to mediasocial
    public function mediasocial(){
        return $this->belongsTo(Mediasocial::class, 'medsos_id', 'id');
    }

    //return relation to franchises
    public function franchises(){
        return $this->belongsTo(Franchise::class, 'franchises_id', 'id');
    }
}
