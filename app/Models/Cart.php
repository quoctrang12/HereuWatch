<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'ma_gh';
    public $timestamps = false;
    protected $fillable = [
        'ma_gh',
        'ID_user'
    ];
}
