<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'ma_hd';
    public $timestamps = false;
    protected $fillable = [
        'ma_hd',
        'ho_ten',
        'so_dien_thoai',
        'dia_chi',
        'ID_user',
        'ngay_lap',
        'tong_tien',
        'trang_thai_don_hang',
        'trang_thai_thanh_toan'
    ];
}
