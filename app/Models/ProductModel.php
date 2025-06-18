<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'code',
        'name',
        'category_id',
        'buy_price',
        'sell_price',
        'stock',
        'min_stock',
        'description',
        'image'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'code' => 'required|min_length[3]|is_unique[products.code,id,{id}]',
        'name' => 'required|min_length[3]',
        'category_id' => 'required|numeric|is_not_unique[categories.id]',
        'buy_price' => 'required|numeric|greater_than[0]',
        'sell_price' => 'required|numeric|greater_than[0]',
        'stock' => 'required|numeric|greater_than_equal_to[0]',
        'min_stock' => 'required|numeric|greater_than[0]',
        'description' => 'permit_empty',
        'image' => 'permit_empty|valid_image[image]'
    ];

    protected $validationMessages = [
        'code' => [
            'required' => 'Kode produk harus diisi',
            'min_length' => 'Kode produk minimal 3 karakter',
            'is_unique' => 'Kode produk sudah ada'
        ],
        'name' => [
            'required' => 'Nama produk harus diisi',
            'min_length' => 'Nama produk minimal 3 karakter'
        ],
        'category_id' => [
            'required' => 'Kategori harus dipilih',
            'numeric' => 'Kategori tidak valid',
            'is_not_unique' => 'Kategori tidak ditemukan'
        ],
        'buy_price' => [
            'required' => 'Harga beli harus diisi',
            'numeric' => 'Harga beli harus berupa angka',
            'greater_than' => 'Harga beli harus lebih dari 0'
        ],
        'sell_price' => [
            'required' => 'Harga jual harus diisi',
            'numeric' => 'Harga jual harus berupa angka',
            'greater_than' => 'Harga jual harus lebih dari 0'
        ],
        'stock' => [
            'required' => 'Stok harus diisi',
            'numeric' => 'Stok harus berupa angka',
            'greater_than_equal_to' => 'Stok tidak boleh negatif'
        ],
        'min_stock' => [
            'required' => 'Stok minimal harus diisi',
            'numeric' => 'Stok minimal harus berupa angka',
            'greater_than' => 'Stok minimal harus lebih dari 0'
        ]
    ];

    public function getProductWithCategory($id = null)
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, categories.name as category_name');
        $builder->join('categories', 'categories.id = products.category_id');
        
        if ($id !== null) {
            return $builder->where('products.id', $id)->get()->getRowArray();
        }
        
        return $builder->get()->getResultArray();
    }

    public function getLowStockProducts()
    {
        return $this->where('stock <=', 'min_stock', false)->findAll();
    }
} 