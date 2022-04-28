<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Bill extends Model
    {
        /**
         * Tên bảng, nếu không có thuộc tính này
         * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
         * 
         * @var string
         */
        protected $table = 'bills';
        protected $primaryKey = 'ma_hd';
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

?>