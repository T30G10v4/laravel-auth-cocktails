<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    use HasFactory;
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $incrementing = false;


    public function cocktails(){
        return $this->hasMany(Cocktail::class, 'technique', 'code');
    }
}
