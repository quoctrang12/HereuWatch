<?php

namespace App\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (isset($_GET['accept'])) {
            Bill::where('ma_hd', $_GET['accept'])->update(['trang_thai_don_hang' => 'Đã xác nhận']);
        } else if (isset($_GET['delete'])) {
            Bill::where('ma_hd', $_GET['delete'])->delete();
            BillDetail::where('ma_hd', $_GET['delete'])->delete();
        }
        $data = ['carts' => Bill::all(), 'countBill' => Bill::count(),
         'countProduct' => Product::count(), 'countUser' => User::count()];
        return $this->sendPage('admins/dashboard', $data);
    }
    public function Product()
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            Product::where('ma_sp',$_POST['masp'])->update([
                'ten_sp'=>$_POST['tensp'],
                'gia_sp'=>$_POST['giasp']
            ]);
        }
        return $this->sendPage('admins/Product', ['products' => Product::all()]);
    }
    public function User()
    {
        return $this->sendPage('admins/User', ['users' => User::all()]);
    }
}
