<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderNumber',
        'userName',
        'email',
        'nameItem',
        'price',
        'image_path',
        'amount',
        'size',
        'phone',
        'type',
        // 'map',
        // 'content'
        // 'status',

    ];

    static function newOrder($resquest)
    {
        Order_product::create($resquest);
        dd($resquest);
    }
}
