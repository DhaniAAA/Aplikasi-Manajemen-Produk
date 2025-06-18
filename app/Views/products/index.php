<!-- app/Views/products/index.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6">DAFTAR PRODUK</h1>

    <div class="flex justify-between items-center mb-4">
        <div>
            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Produk</a>
            <a href="#" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Import</a>
        </div>
        <div class="flex">
            <input type="text" placeholder="Search..." class="border p-2 rounded-l">
            <select class="border p-2 rounded-r">
                <option>Filter</option>
                <option>Kategori 1</option>
                <option>Kategori 2</option>
            </select>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stok</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Rows (will be replaced by dynamic data) -->
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">P001</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Produk A</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">20</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Rp 10.000</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Elektronik</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900 ml-3">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">P002</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Produk B</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">15</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Rp 25.000</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Pakaian</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900 ml-3">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-6">
        <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Previous</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Next</a>
        </nav>
    </div>
</div>
<?= $this->endSection() ?>