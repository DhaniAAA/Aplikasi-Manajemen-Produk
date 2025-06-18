<?php namespace App\Controllers;

class Product extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => [], // Ini akan diisi dari model nanti
        ];
        return view('products/index', $data);
    }

    public function detail($id = null)
    {
        // Logic to fetch product details based on $id
        $data = [
            'title' => 'Detail Produk',
            'product' => ['id' => $id, 'name' => 'Produk Contoh'], // Example data
        ];
        return view('products/detail', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Produk',
        ];
        return view('products/form', $data);
    }

    public function create()
    {
        // Logic to create a new product
        return redirect()->to('/products')->with('message', 'Produk berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        // Logic to fetch product data for editing
        $data = [
            'title' => 'Edit Produk',
            'product' => ['id' => $id, 'name' => 'Produk Contoh'], // Example data
        ];
        return view('products/form', $data);
    }

    public function update($id = null)
    {
        // Logic to update an existing product
        return redirect()->to('/products/detail/' . $id)->with('message', 'Produk berhasil diperbarui.');
    }
}