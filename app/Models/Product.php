<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Product extends Model
    {
        
        /**
         * Tên bảng, nếu không có thuộc tính này
         * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
         * 
         * @var string
         */
        protected $table = 'products';
        // Xác định khóa chính
        protected $primaryKey = 'ma_sp';
        // Tắt tự động tăng
        public $incrementing = false;
        //Xác định kiểu dữ liệu khóa chính 
        protected $keyType = 'string';
        /* Lấy tất cả sản phẩm
        use App\Models\Product;
        foreach (Product::all() as $product) {
            echo $product->name;
         }*/
         // Cập nhật giá trị csdl
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
            'ma_sp',
            'ma_lsp',
            'ten_sp',
            'gia_sp',
            'image'
        ];  

        
        public function typeProduct()
        {
            return $this->belongsTo(TypeProduct::class ,'ma_lsp');
        }
    }

?>