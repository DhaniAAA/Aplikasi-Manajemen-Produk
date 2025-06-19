<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    protected $productModel;
    protected $categoryModel;

        public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => $this->productModel->getProductWithCategory(),
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
            'validation' => \Config\Services::validation(),
            'categories' => $this->categoryModel->findAll()
        ];
        return view('products/form', $data);
    }

        public function create()
    {
        if (!$this->validate($this->productModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->productModel->save([
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'buy_price' => $this->request->getPost('buy_price'),
            'sell_price' => $this->request->getPost('sell_price'),
            'stock' => $this->request->getPost('stock'),
            'min_stock' => $this->request->getPost('min_stock'),
            'description' => $this->request->getPost('description'),
            'image' => $this->request->getPost('image'),
        ]);

        return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan.');
    }

        public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Produk',
            'product' => $this->productModel->find($id),
            'validation' => \Config\Services::validation(),
            'categories' => $this->categoryModel->findAll()
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