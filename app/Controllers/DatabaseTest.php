<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class DatabaseTest extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        try {
            $db->reconnect();
            if ($db->connect(true)) {
                $status = '<p style="color: green;">Koneksi database berhasil!</p>';
            } else {
                $status = '<p style="color: red;">Koneksi database gagal: Gagal melakukan ping ke database.</p>';
            }
        } catch (DatabaseException $e) {
            $status = '<p style="color: red;">Koneksi database gagal: ' . $e->getMessage() . '</p>';
        }

        return view('database_test', ['status' => $status]);
    }
}
