<!-- app/Views/products/detail.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6">DETAIL PRODUK</h1>

    <div class="flex justify-end items-center mb-4">
        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        <a href="#" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex justify-center items-center bg-gray-200 rounded-lg h-64">
                <p class="text-gray-500 text-xl">[Gambar Produk]</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-4">Informasi Produk</h2>
                <p class="mb-2"><strong>Kode:</strong> P001</p>
                <p class="mb-2"><strong>Nama:</strong> Produk Contoh</p>
                <p class="mb-2"><strong>Kategori:</strong> Elektronik</p>
                <p class="mb-2"><strong>Harga Beli:</strong> Rp 100.000</p>
                <p class="mb-2"><strong>Harga Jual:</strong> Rp 150.000</p>
                <p class="mb-2"><strong>Stok Saat Ini:</strong> 25</p>
                <p class="mb-2"><strong>Stok Minimal:</strong> 10</p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">RIWAYAT TRANSAKSI</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tipe</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Rows (will be replaced by dynamic data) -->
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">01/01/2023</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Masuk</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">10</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Pembelian dari Supplier X</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">05/01/2023</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Keluar</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">2</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Penjualan ke Pelanggan Y</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>