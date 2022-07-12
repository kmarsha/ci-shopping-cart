<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product as ModelsProduct;

class Product extends BaseController
{
    public function __construct() {
        $this->model = new ModelsProduct();  
        $this->cart = \Config\Services::cart();
    }

    public function get_count_cart()
    {
        $cart = count($this->cart->contents());
        
        return "$cart";
    }

    public function get_cart()
    {
        $data = [
            'title' => 'Cart',
            'content' => 'cart',
            'carts' => $this->cart->contents(),
            'products' => $this->model->findAll(),
        ];

        return view('v_wrapper', $data);
    }

    public function add_to_cart()
    {
        $data = [
            'id' => $this->request->getPost('product_id'),
            'name' => $this->request->getPost('product_name'),
            'price' => $this->request->getPost('product_price'),
            'qty' => $this->request->getPost('quantity'),
        ];

        $this->cart->insert($data);

        return $this->show_cart();
    }

    public function show_cart()
    {
        $output = '';
        $no = 0;

        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>Rp.'.number_format($items['price'], 2, ',', '.').'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal'], 2, ',', '.').'</td>
                    <td class="text-center">
                        <button type="button" id="'.$items['rowid'].'" class="remove_cart btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            ';
        }

        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }

    public function load_cart()
    {
        return $this->show_cart();
    }

    public function delete_cart()
    {
        $data = [
            'rowid' => $this->request->getPost('row_id'),
            'qty' => 0,
        ];

        $this->cart->update($data);

        return $this->show_cart();

        // return redirect()->to('/');
    }
}
