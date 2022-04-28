<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class TypeProduct extends Model
    {
        
        /**
         * Tên bảng, nếu không có thuộc tính này
         * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
         * 
         * @var string
         */
        protected $table = 'type_products';
        protected $primaryKey = 'ma_lsp';
        // Tắt tự động tăng
        public $incrementing = false;
        //Xác định kiểu dữ liệu khóa chính 
        protected $keyType = 'string';
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
            'ma_lsp',
            'ten_lsp'
        ]; 
        
        public function products(){
            return $this->hasMany(Product::class,'ma_lsp');
        }
    }

?>