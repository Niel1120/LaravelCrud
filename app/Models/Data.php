<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
//table
    protected $table = 'datas';

    protected $fillable = [
        'name',
        'image',
        'phone',
        'email',
        'password',
        'country',
        'gender',
        'education',
        'mode',
    ];


}
