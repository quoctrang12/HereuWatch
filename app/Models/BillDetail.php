<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';
    public $timestamps = false;
    protected $fillable = [
        'ma_hd',
        'so_luong_hoa_don',
        'ma_sp'
    ];
}
