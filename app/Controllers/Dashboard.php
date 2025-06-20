<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ActivityLogModel;
use App\Models\TransactionModel;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $activityLogModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->activityLogModel = new ActivityLogModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        // Hitung jumlah transaksi hari ini
        $today = date('Y-m-d');
        $todayTransactions = $this->getTodayTransactionsCount($today);
        
        $data = [
            'title' => 'Dashboard',
            'total_products' => $this->productModel->countAll(),
            'low_stock_products' => count($this->productModel->getLowStockProducts()),
            'today_transactions' => $todayTransactions,
            'recent_activities' => $this->activityLogModel->getRecentActivities(10)
        ];

        return view('dashboard/index', $data);
    }
    
    private function getTodayTransactionsCount($date)
    {
        $db = \Config\Database::connect();
        
        $query = $db->table('transactions')
            ->where('DATE(date)', $date)
            ->countAllResults();
            
        return $query;
    }
}