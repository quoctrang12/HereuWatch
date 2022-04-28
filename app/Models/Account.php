<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Account extends Model
    {
        
        /**
         * Tên bảng, nếu không có thuộc tính này
         * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
         * 
         * @var string
         */
        protected $table = 'accounts';
        protected $primaryKey= 'ussername';
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
            'username',
            'password'
        ];

        public $errors = [];

        public function validate($data = [])
        {
            // validate username
            $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
            if(!preg_match($pattern, $data['username'])){
                $this->errors['username'] = 'Only letters, numbers, underscore and at least 6 character long allowed';
            }

            // validate email
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = 'Invalid email format';
            }

            // validate password
            $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
            if(!preg_match($pattern, $data['password'])){
                $this->errors['password'] = 'Password must contains at least one capitalize letter, number and special character.';
            }

            if($data['password'] != $data['confirm_password']){
                $this->errors['confirm_password'] = 'Password does not match.';
            }
            // validate username exists
            $user = Account::where(['username' => $data['username']])->first();
            if($user){
                $this->errors['username'] = 'This username is already taken. Please choose another one.';
            }

            if(count($this->errors)){
                return false;
            }
            return true;

        }

        public function user(){
            return $this->hasOne(User::class,'username');
        }

    }

?>