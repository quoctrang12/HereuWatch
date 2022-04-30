<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartDetail extends Model
{
    protected $table = 'cart_details';
    public $timestamps = false;
    protected $fillable = [
        'ma_gh',
        'ma_sp',
        'so_luong'
    ];
}
