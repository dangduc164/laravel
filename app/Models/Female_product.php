<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Female_product extends Model
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
        // Female_product::create($resquest);
        try {
            Female_product::create($resquest);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    static function upd($resquest, $id)
    {
        Female_product::where('id', $id)->update($resquest);
        return true;
    }
}
