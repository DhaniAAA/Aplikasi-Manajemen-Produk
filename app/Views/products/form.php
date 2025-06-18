<!-- app/Views/products/form.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6">TAMBAH / EDIT PRODUK</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="#" method="POST">
            <div class="mb-4">
                <label for="kode_produk" class="block text-gray-700 text-sm font-bold mb-2">Kode Produk:</label>
                <input type="text" id="kode_produk" name="kode_produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Kode Produk">
            </div>

            <div class="mb-4">
                <label for="nama_produk" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Produk">
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                <select id="kategori" name="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Pilih Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="pakaian">Pakaian</option>
                    <option value="makanan">Makanan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="harga_beli" class="block text-gray-700 text-sm font-bold mb-2">Harga Beli:</label>
                <input type="number" id="harga_beli" name="harga_beli" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Harga Beli">
            </div>

            <div class="mb-4">
                <label for="harga_jual" class="block text-gray-700 text-sm font-bold mb-2">Harga Jual:</label>
                <input type="number" id="harga_jual" name="harga_jual" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Harga Jual">
            </div>

            <div class="mb-4">
                <label for="stok_minimal" class="block text-gray-700 text-sm font-bold mb-2">Stok Minimal:</label>
                <input type="number" id="stok_minimal" name="stok_minimal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Stok Minimal">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Deskripsi Produk"></textarea>
            </div>

            <div class="mb-6">
                <label for="gambar_produk" class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar:</label>
                <input type="file" id="gambar_produk" name="gambar_produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>