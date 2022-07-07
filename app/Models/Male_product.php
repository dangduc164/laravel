<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Male_product extends Model
{
    use HasFactory;


    // protected $table = 'male_products';
    // protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'price',
        'content',
        'image_path',


    ];
    static function add($resquest)
    {
        Male_product::create($resquest);
    }

    // static function upd($resquest){

    // }
}
