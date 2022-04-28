<?php

namespace App\Controllers;

use App\Models;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use PDOException;

class CartController extends Controller
{
    public function Cart()
    {
        if (!auth()) {
            return $this->sendPage('home/index');
        }
        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ma_gh;
        $this->sendPage('products/cart', ['carts' => CartDetail::join('products', 'Products.ma_sp', '=', 'Cart_Details.ma_sp')->where('ma_gh', $ma_gh)->get()]);
    }

    public function addCart()
    {
        $soluong = 1;
        $masp = $_GET['masp'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masp = $_POST['masp'];
            $soluong = $_POST['soluong'];
        }
        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ma_gh;
        try {
            CartDetail::create([
                'ma_gh' => $ma_gh,
                'ma_sp' => $masp,
                'so_luong' => $soluong
            ]);
        } catch (PDOException $pe) {
            $so_luong = CartDetail::where('ma_sp', $masp)->where('ma_gh', $ma_gh)->first()->so_luong;
            CartDetail::where('ma_sp', $masp)->where('ma_gh', $ma_gh)->update([
                'so_luong' => ($so_luong + $soluong)
            ]);
        }
        redirect('/cart');
    }
    public function deleteCart()
    {
      
        $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ma_gh;
        CartDetail::where('ma_gh',$ma_gh)->where('ma_sp',$_GET['delete'])->delete();
        redirect('/cart');
    }

    public function pay()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bill = Bill::create(
                [
                    'ho_ten' => $_POST['name'],
                    'so_dien_thoai' => $_POST['sdt'],
                    'dia_chi' => $_POST['address'],
                    'ID_user' => User::where('username', auth()->username)->first()->ID_user,
                    'ngay_lap' => Date::now(7),
                    'tong_tien' => $_POST['tongtien'],
                    'trang_thai_don_hang' => 'Đang xác nhận',
                    'trang_thai_thanh_toan' => 'Chưa thanh toán'
                ]
            );
            $ma_gh = Cart::join('users', 'users.ID_user', '=', 'carts.ID_user')->where('username', auth()->username)->first()->ma_gh;
            $carts = CartDetail::where('ma_gh', $ma_gh)->get();
            foreach ($carts as $cart) {
                BillDetail::create([
                    'ma_hd' => $bill->ma_hd,
                    'ma_sp' => $cart->ma_sp,
                    'so_luong_hoa_don' => $cart->so_luong
                ]);
                CartDetail::where('ma_gh', $ma_gh)->where('ma_sp', $cart->ma_sp)->delete();
            }
        }
        redirect('/cart');
    }
}
