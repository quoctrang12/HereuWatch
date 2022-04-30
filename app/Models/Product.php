<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';
    // Xác định khóa chính
    protected $primaryKey = 'ma_sp';
    // Tắt tự động tăng
    public $incrementing = false;
    //Xác định kiểu dữ liệu khóa chính 
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'ma_sp',
        'ma_lsp',
        'ten_sp',
        'gia_sp',
        'image'
    ];
    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'ma_lsp');
    }
}
