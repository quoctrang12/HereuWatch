<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        if (isset($_GET['malsp']))
            $products = Product::where('ma_lsp', $_GET['malsp'])->get();
        $data = [
            'products' => $products, 'typeProduct' => TypeProduct::all(),
            'male' => Product::where('ma_lsp', 'L01')->count(), 'female' => Product::where('ma_lsp', 'L02')->count()
        ];
        return $this->sendPage('products/product', $data);
    }
    public function productDetail()
    {
        $masp = $_GET['masp'];
        return $this->sendPage('products/productDetails', ['productDetail' => Product::where('ma_sp', $masp)->first()]);
    }
}
