<?php namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => $this->productModel->findAll(),
        ];
        return view('products/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Produk',
            'product' => $this->productModel->find($id),
        ];
        return view('products/detail', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Produk',
            'validation' => \Config\Services::validation()
        ];
        return view('products/form', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ])) {
            return redirect()->to('new')->withInput();
        }

        $this->productModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to('products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Produk',
            'product' => $this->productModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('products/form', $data);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ])) {
            return redirect()->to('edit/' . $id)->withInput();
        }

        $this->productModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to('products')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        $this->productModel->delete($id);
        return redirect()->to('products')->with('success', 'Produk berhasil dihapus.');
    }
}