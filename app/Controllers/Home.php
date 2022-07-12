<?php

namespace App\Controllers;

use App\Models\Product;

class Home extends BaseController
{
    public function index()
    {
        $model = new Product();
        $cart = \Config\Services::cart();

        $data = [
            'title' => 'Home',
            'content' => 'home',
            'products' => $model->findAll(),
            'carts' => $cart->contents(),
            'cart_count' => count($cart->contents()),
        ];
        
        return view('v_wrapper', $data);
    }
}
