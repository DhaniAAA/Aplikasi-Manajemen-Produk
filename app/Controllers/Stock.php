<?php namespace App\Controllers;

class Stock extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi Stok',
        ];
        return view('stock/index', $data);
    }
}