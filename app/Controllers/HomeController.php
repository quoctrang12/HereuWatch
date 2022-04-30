<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;

class HomeController extends Controller
{
    public function error()
    {
        return $this->sendPage('errors/error');
    }

    public function index()
    {
        $product = Product::where('ma_lsp', 'L01')->limit(6)->get();
        return $this->sendPage('home/index', ['products' => $product]);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'products' => Product::where('ten_sp', 'like', '%' . $_POST["search"] . '%')->get(),
                'typeProduct' => TypeProduct::all(),
                'male' => Product::where('ma_lsp', 'L01')->count(),
                'female' => Product::where('ma_lsp', 'L02')->count()
            ];
            return $this->sendPage('products/product', $data);
        }
    }
}
