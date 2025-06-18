<!-- app/Views/stock/index.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<h4 class="mb-3">Transaksi Stok</h4>

<ul class="nav nav-tabs mb-3" id="stockTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="stock-in-tab" data-bs-toggle="tab" data-bs-target="#stock-in" type="button" role="tab" aria-controls="stock-in" aria-selected="true">Stok Masuk</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="stock-out-tab" data-bs-toggle="tab" data-bs-target="#stock-out" type="button" role="tab" aria-controls="stock-out" aria-selected="false">Stok Keluar</button>
    </li>
</ul>

<div class="tab-content" id="stockTabContent">
    <!-- Stok Masuk Panel -->
    <div class="tab-pane fade show active" id="stock-in" role="tabpanel" aria-labelledby="stock-in-tab">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="<?= base_url('stock/in') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_in" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="date_in" name="date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description_in" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description_in" name="description" placeholder="Contoh: Pembelian dari supplier" required>
                        </div>
                    </div>
                    <!-- Dynamic product rows will be handled by JavaScript -->
                    <div id="stock-in-items"></div>
                    <button type="button" id="add-stock-in-item" class="btn btn-secondary btn-sm mb-3">Tambah Produk</button>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Stok Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Stok Keluar Panel -->
    <div class="tab-pane fade" id="stock-out" role="tabpanel" aria-labelledby="stock-out-tab">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="<?= base_url('stock/out') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_out" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="date_out" name="date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description_out" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description_out" name="description" placeholder="Contoh: Penjualan atau barang rusak" required>
                        </div>
                    </div>
                    <!-- Dynamic product rows will be handled by JavaScript -->
                    <div id="stock-out-items"></div>
                    <button type="button" id="add-stock-out-item" class="btn btn-secondary btn-sm mb-3">Tambah Produk</button>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Stok Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>