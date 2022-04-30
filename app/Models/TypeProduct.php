<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeProduct extends Model
{
    protected $table = 'type_products';
    protected $primaryKey = 'ma_lsp';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'ma_lsp',
        'ten_lsp'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'ma_lsp');
    }
}
