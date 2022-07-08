<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Spmale extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'price',
        'content',
    ];

    static function add($resquest)
    {

        Spmale::create($resquest);
    }
}
