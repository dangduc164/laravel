<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoes_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'content',
        'image_path',
    ];

    static function add($resquest)
    {
        Shoes_product::create($resquest);
    }
}
