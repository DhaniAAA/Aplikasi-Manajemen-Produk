<?php namespace App\Controllers;

class Reports extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan',
        ];
        return view('reports/index', $data);
    }
}