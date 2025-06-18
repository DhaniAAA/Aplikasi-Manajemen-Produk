<!-- app/Views/reports/index.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6">LAPORAN</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="jenis_laporan" class="block text-gray-700 text-sm font-bold mb-2">Jenis Laporan:</label>
                <select id="jenis_laporan" name="jenis_laporan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="stok">Laporan Stok</option>
                    <option value="transaksi">Laporan Transaksi</option>
                    <option value="inventaris">Laporan Nilai Inventaris</option>
                </select>
            </div>
            <div class="flex items-end space-x-4">
                <div>
                    <label for="periode_dari" class="block text-gray-700 text-sm font-bold mb-2">Dari:</label>
                    <input type="date" id="periode_dari" name="periode_dari" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="periode_sampai" class="block text-gray-700 text-sm font-bold mb-2">Sampai:</label>
                    <input type="date" id="periode_sampai" name="periode_sampai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-4 mb-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Filter</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none">Reset</button>
        </div>

        <div class="bg-gray-100 border border-gray-300 rounded p-4 h-64 flex items-center justify-center text-gray-500 mb-6">
            <!-- Area Laporan: Menampilkan data dalam bentuk tabel atau grafik sesuai jenis laporan -->
            <p>Data laporan akan ditampilkan di sini.</p>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Export PDF
            </button>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Export XLS
            </button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>