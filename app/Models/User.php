<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class User extends Model
    {
        /**
         * Tên bảng, nếu không có thuộc tính này
         * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
         * 
         * @var string
         */
        protected $table = 'users';
        protected $primaryKey = 'ID_user';
        /**
         * Sử dụng các thuộc tính created_at và update_at trong bảng
         * 
         * @var boolean
         */
        public $timestamps = false;

        /**
         * Danh sách các thuộc tính để gán hàng loạt (massive assignment)
         * Khi dùng phương thức $model->fill($array) sẽ gán các giá trị trong mảng
         * Phương thức fill() được sử dụng thay thể phương thức set() cho từng thuộc tính
         * 
         * @var array
         */
        protected $fillable = [
            'ID_user',
            'email',
            'hoten',
            'username'
        ];
        public function account()
    {
        
        return $this->belongsTo(Account::class,'ID_user');
    }
    }

?>