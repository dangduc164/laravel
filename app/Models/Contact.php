<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fullname',
        'email',
        'phone',
        'comment',
    ];

    static function add($request)
    {


        try {
            Contact::create($request);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
