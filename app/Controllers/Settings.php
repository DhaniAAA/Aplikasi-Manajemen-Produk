<?php

namespace App\Controllers;

class Settings extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pengaturan Sistem',
        ];
        
        return view('settings/index', $data);
    }
    
    public function update()
    {
        // Validasi input
        $rules = [
            'company_name' => 'required|min_length[3]',
            'company_address' => 'required',
            'company_phone' => 'required',
            'company_email' => 'required|valid_email',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Simpan pengaturan ke database atau file konfigurasi
        // Contoh: menggunakan session untuk menyimpan sementara
        session()->set('settings', [
            'company_name' => $this->request->getPost('company_name'),
            'company_address' => $this->request->getPost('company_address'),
            'company_phone' => $this->request->getPost('company_phone'),
            'company_email' => $this->request->getPost('company_email'),
            'tax_percentage' => $this->request->getPost('tax_percentage'),
        ]);
        
        return redirect()->to('settings')->with('success', 'Pengaturan berhasil disimpan.');
    }
}