<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Reader extends Model
{
    // Reader.php 
    protected $fillable = [
        'name',
        'birthday',
        'address',
        'phone',
    ];
}

