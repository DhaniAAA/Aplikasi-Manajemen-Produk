<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\ActivityLogModel;

class Stock extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $transactionDetailModel;
    protected $activityLogModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();
        $this->activityLogModel = new ActivityLogModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi Stok',
            'products' => $this->productModel->findAll()
        ];
        return view('stock/index', $data);
    }

    public function stockIn()
    {
        $post = $this->request->getPost(['date', 'description', 'product_id', 'quantity']);

        // 1. Simpan Transaksi Utama
        $transactionData = [
            'transaction_code' => 'IN-' . time(), // Contoh kode transaksi
            'type'             => 'in',
            'date'             => $post['date'],
            'notes'            => $post['description'],
            'user_id'          => session()->get('user_id') // Ambil dari sesi
        ];

        $db = \Config\Database::connect();
        $db->transStart();

        $this->transactionModel->insert($transactionData);
        $transactionId = $this->transactionModel->getInsertID();

        // 2. Simpan Detail Transaksi dan Update Stok
        $totalItems = 0;
        if (isset($post['product_id']) && is_array($post['product_id'])) {
            for ($i = 0; $i < count($post['product_id']); $i++) {
                $productId = $post['product_id'][$i];
                $quantity = $post['quantity'][$i];

                if (empty($productId) || empty($quantity)) continue;

                // Simpan detail
                $detailData = [
                    'transaction_id' => $transactionId,
                    'product_id'     => $productId,
                    'quantity'       => $quantity,
                ];
                $this->transactionDetailModel->insert($detailData);

                // Update stok produk
                $this->productModel->set('stock', 'stock + ' . (int)$quantity, false)->where('id', $productId)->update();
                $totalItems++;
            }
        }

        // 3. Log Aktivitas
        $this->activityLogModel->insert([
            'user_id' => session()->get('user_id'),
            'action'  => 'Stok Masuk',
            'description' => 'Menambahkan ' . $totalItems . ' item produk baru. Deskripsi: ' . $post['description']
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('/stock')->with('error', 'Gagal menambahkan stok. Terjadi kesalahan pada database.');
        }

        return redirect()->to('/stock')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function stockOut()
    {
        $post = $this->request->getPost(['date', 'description', 'product_id', 'quantity']);

        // 1. Validasi Stok
        if (isset($post['product_id']) && is_array($post['product_id'])) {
            for ($i = 0; $i < count($post['product_id']); $i++) {
                $productId = $post['product_id'][$i];
                $quantity = $post['quantity'][$i];

                if (empty($productId) || empty($quantity)) continue;

                $product = $this->productModel->find($productId);
                if (!$product || $product['stock'] < $quantity) {
                    return redirect()->to('/stock')->with('error', 'Stok produk ' . ($product['name'] ?? 'yang dipilih') . ' tidak mencukupi!');
                }
            }
        }

        // 2. Simpan Transaksi Utama
        $transactionData = [
            'transaction_code' => 'OUT-' . time(), // Contoh kode transaksi
            'type'             => 'out',
            'date'             => $post['date'],
            'notes'            => $post['description'],
            'user_id'          => session()->get('user_id') // Ambil dari sesi
        ];

        $db = \Config\Database::connect();
        $db->transStart();

        $this->transactionModel->insert($transactionData);
        $transactionId = $this->transactionModel->getInsertID();

        // 3. Simpan Detail Transaksi dan Update Stok
        $totalItems = 0;
        if (isset($post['product_id']) && is_array($post['product_id'])) {
            for ($i = 0; $i < count($post['product_id']); $i++) {
                $productId = $post['product_id'][$i];
                $quantity = $post['quantity'][$i];

                if (empty($productId) || empty($quantity)) continue;

                // Simpan detail
                $detailData = [
                    'transaction_id' => $transactionId,
                    'product_id'     => $productId,
                    'quantity'       => $quantity,
                ];
                $this->transactionDetailModel->insert($detailData);

                // Update stok produk
                $this->productModel->set('stock', 'stock - ' . (int)$quantity, false)->where('id', $productId)->update();
                $totalItems++;
            }
        }

        // 4. Log Aktivitas
        $this->activityLogModel->insert([
            'user_id' => session()->get('user_id'),
            'action'  => 'Stok Keluar',
            'description' => 'Mengeluarkan ' . $totalItems . ' item produk. Deskripsi: ' . $post['description']
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('/stock')->with('error', 'Gagal mengeluarkan stok. Terjadi kesalahan pada database.');
        }

        return redirect()->to('/stock')->with('success', 'Stok berhasil dikeluarkan!');
    }
}