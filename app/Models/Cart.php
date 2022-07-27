<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderNumber',
        'user_Name',
        'email',
        'phone',
        'image_path',
        'name_products',
        'content',
        'price',
        'amount',
        'size',
        'type',
        'status',
        'delivery',

    ];

    static function newItem($resquest, $id)
    {
        Cart::where('id', $id)->update($resquest);
    }
    static function newOrder($resquest, $orderNumber)
    {
        Cart::where('orderNumber', $orderNumber)->update($resquest);
    }
    static function cancelOrder($resquest, $orderNumber)
    {
        Cart::where('orderNumber', $orderNumber)->update($resquest);
    }

    //xác nhận đơn hàng
    static function comfirm($resquest, $orderNumber)
    {
        Cart::where('orderNumber', $orderNumber)->update($resquest);
    }
}
