<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kategori',
            'categories' => $this->categoryModel->findAll(),
        ];
        return view('categories/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'validation' => \Config\Services::validation()
        ];
        return view('categories/form', $data);
    }

    public function create()
    {
        if (!$this->validate($this->categoryModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->categoryModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Kategori',
            'category' => $this->categoryModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('categories/form', $data);
    }

    public function update($id = null)
    {
        $oldCategory = $this->categoryModel->find($id);
        $validationRules = $this->categoryModel->getValidationRules();

        if ($this->request->getPost('name') === $oldCategory['name']) {
            unset($validationRules['name']);
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->categoryModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('/categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
