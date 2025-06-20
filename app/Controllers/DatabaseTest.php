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
                // Coba menjalankan query sederhana
                $query = $db->query('SELECT 1');
                
                if ($query) {
                    $status = '<div style="color: green; font-size: 24px;">
                                <strong>Koneksi Database Berhasil!</strong>
                              </div>
                              <p>Database terhubung dengan baik.</p>
                              <p>Database: ' . $db->database . '</p>
                              <p>Host: ' . $db->hostname . '</p>
                              <p>Driver: ' . $db->DBDriver . '</p>';
                    
                    // Cek tabel yang ada
                    $tables = $db->listTables();
                    if (count($tables) > 0) {
                        $status .= '<p>Tabel yang tersedia: ' . count($tables) . '</p>';
                        $status .= '<ul style="text-align: left;">';
                        foreach ($tables as $table) {
                            $status .= '<li>' . $table . '</li>';
                        }
                        $status .= '</ul>';
                    } else {
                        $status .= '<p>Tidak ada tabel yang ditemukan dalam database.</p>';
                    }
                } else {
                    $status = '<div style="color: red; font-size: 24px;">
                                <strong>Koneksi Database Gagal!</strong>
                              </div>
                              <p>Tidak dapat menjalankan query.</p>';
                }
            } else {
                $status = '<div style="color: red; font-size: 24px;">
                            <strong>Koneksi Database Gagal!</strong>
                          </div>
                          <p>Gagal melakukan ping ke database.</p>';
            }
        } catch (DatabaseException $e) {
            $status = '<div style="color: red; font-size: 24px;">
                        <strong>Koneksi Database Gagal!</strong>
                      </div>
                      <p>Error: ' . $e->getMessage() . '</p>';
        }

        return view('database_test', ['status' => $status]);
    }
}
