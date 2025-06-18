<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ActivityLogModel;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $activityLogModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->activityLogModel = new ActivityLogModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'total_products' => $this->productModel->countAll(),
            'low_stock_products' => count($this->productModel->getLowStockProducts()),
            'recent_activities' => $this->activityLogModel->getRecentActivities(10),
            'content' => 'dashboard/index'
        ];

        return view('layouts/app', $data);
    }
} 