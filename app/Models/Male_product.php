<?php

namespace App\Models;

use Exception;
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
        // Male_product::create($resquest);
        try {
            Male_product::create($resquest);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    static function upd($resquest, $id)
    {
        Male_product::where('id', $id)->update($resquest);
        return true;
    }
}
