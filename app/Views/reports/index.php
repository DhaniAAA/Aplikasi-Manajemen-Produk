<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<h4 class="mb-3">Laporan</h4>

<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0">Filter Laporan</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('reports/generate') ?>" method="post">
            <?= csrf_field() ?>
            <div class="row align-items-end">
                <div class="col-md-4 mb-3">
                    <label for="report_type" class="form-label">Jenis Laporan</label>
                    <select id="report_type" name="report_type" class="form-select">
                        <option value="stock">Laporan Stok</option>
                        <option value="sales">Laporan Penjualan</option>
                        <option value="inventory_value">Laporan Nilai Inventaris</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="start_date" class="form-label">Dari Tanggal</label>
                    <input type="date" id="start_date" name="start_date" class="form-control">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                    <input type="date" id="end_date" name="end_date" class="form-control">
                </div>
                <div class="col-md-2 mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Hasil Laporan</h5>
        <div>
            <button class="btn btn-danger btn-sm">Export PDF</button>
            <button class="btn btn-success btn-sm">Export Excel</button>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center text-muted p-5">
            <p>Pilih jenis laporan dan periode, lalu klik "Tampilkan" untuk melihat hasilnya.</p>
        </div>
        <!-- Report data will be displayed here -->
    </div>
</div>

<?= $this->endSection() ?>