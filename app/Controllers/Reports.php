<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\CategoryModel;

class Reports extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $transactionDetailModel;
    protected $categoryModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();
        $this->categoryModel = new CategoryModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Laporan',
        ];
        return view('reports/index', $data);
    }
    
    public function generate()
    {
        $reportType = $this->request->getPost('report_type');
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        
        $data = [
            'title' => 'Laporan',
            'report_type' => $reportType,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
        
        switch ($reportType) {
            case 'stock':
                $data['report_title'] = 'Laporan Stok Produk';
                $data['products'] = $this->productModel->getProductWithCategory();
                $data['report_view'] = 'reports/stock_report';
                break;
                
            case 'inventory_value':
                $data['report_title'] = 'Laporan Nilai Inventaris';
                $data['products'] = $this->productModel->getProductWithCategory();
                $data['total_value'] = $this->calculateInventoryValue($data['products']);
                $data['report_view'] = 'reports/inventory_report';
                break;
                
            case 'sales':
                $data['report_title'] = 'Laporan Penjualan';
                $data['transactions'] = $this->getTransactionsByDateRange($startDate, $endDate, 'out');
                $data['report_view'] = 'reports/transaction_report';
                break;
                
            case 'transaction':
                $data['report_title'] = 'Laporan Transaksi';
                $data['transactions'] = $this->getTransactionsByDateRange($startDate, $endDate);
                $data['report_view'] = 'reports/transaction_report';
                break;
                
            default:
                return redirect()->to('/reports')->with('error', 'Jenis laporan tidak valid');
        }
        
        return view('reports/index', $data);
    }
    
    private function calculateInventoryValue($products)
    {
        $totalValue = 0;
        foreach ($products as $product) {
            $totalValue += $product['stock'] * $product['buy_price'];
        }
        return $totalValue;
    }
    
    private function getTransactionsByDateRange($startDate, $endDate, $type = null)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('transactions')
            ->select('transactions.*, users.name as user_name, SUM(transaction_details.quantity) as total_items')
            ->join('users', 'users.id = transactions.user_id')
            ->join('transaction_details', 'transaction_details.transaction_id = transactions.id')
            ->where('transactions.date >=', $startDate)
            ->where('transactions.date <=', $endDate);
            
        // Filter berdasarkan tipe transaksi jika parameter $type diberikan
        if ($type !== null) {
            $builder->where('transactions.type', $type);
        }
        
        $query = $builder->groupBy('transactions.id')
            ->orderBy('transactions.date', 'DESC')
            ->get();
            
        return $query->getResultArray();
    }
}