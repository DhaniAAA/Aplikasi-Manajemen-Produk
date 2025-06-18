<!-- app/Views/stock/index.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6">TRANSAKSI STOK</h1>

    <div class="flex mb-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-l focus:outline-none">Stok Masuk</button>
        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r focus:outline-none">Stok Keluar</button>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="no_transaksi" class="block text-gray-700 text-sm font-bold mb-2">No. Transaksi:</label>
                <input type="text" id="no_transaksi" name="no_transaksi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="[Auto]" readonly>
            </div>
            <div>
                <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>

        <div class="mb-4">
            <label for="cari_produk" class="block text-gray-700 text-sm font-bold mb-2">Cari Produk:</label>
            <input type="text" id="cari_produk" name="cari_produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Cari Produk...">
        </div>

        <div class="overflow-x-auto mb-6">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Produk</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Keterangan</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows, to be populated dynamically -->
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">P001</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Produk A</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">10</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Pembelian awal</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button class="text-red-600 hover:text-red-900">-</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">P002</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Produk B</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">5</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Untuk penjualan</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button class="text-red-600 hover:text-red-900">-</button>
                        </td>
                    </tr>
                    <!-- Add new item row -->
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><input type="text" class="w-full border rounded p-1"></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><input type="text" class="w-full border rounded p-1"></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><input type="number" class="w-full border rounded p-1"></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><input type="text" class="w-full border rounded p-1"></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button class="text-green-600 hover:text-green-900">+</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-6">
            <label for="catatan" class="block text-gray-700 text-sm font-bold mb-2">Catatan:</label>
            <textarea id="catatan" name="catatan" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Tambahkan catatan transaksi"></textarea>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan Transaksi
            </button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>