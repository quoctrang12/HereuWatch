<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID_user';
    public $timestamps = false;
    protected $fillable = [
        'ID_user',
        'email',
        'hoten',
        'username'
    ];
    public function account()
    {

        return $this->belongsTo(Account::class, 'ID_user');
    }
}
