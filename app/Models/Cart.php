<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'price',
        'content',
        'amount',
        'size',
        'phone',
        // 'status',

    ];

    static function newItem($resquest, $id)
    {
        Cart::where('id', $id)->update($resquest);
    }
}
