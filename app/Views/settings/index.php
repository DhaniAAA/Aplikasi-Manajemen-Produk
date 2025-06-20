<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">Pengaturan Sistem</h5>
    </div>
    <div class="card-body">
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('settings/update') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="company_name" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?= old('company_name', session()->get('settings.company_name') ?? 'PT Inventaris Sejahtera') ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="company_address" class="form-label">Alamat Perusahaan</label>
                <textarea class="form-control" id="company_address" name="company_address" rows="3" required><?= old('company_address', session()->get('settings.company_address') ?? 'Jl. Inventaris No. 123, Jakarta') ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="company_phone" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="company_phone" name="company_phone" value="<?= old('company_phone', session()->get('settings.company_phone') ?? '021-12345678') ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="company_email" class="form-label">Email Perusahaan</label>
                    <input type="email" class="form-control" id="company_email" name="company_email" value="<?= old('company_email', session()->get('settings.company_email') ?? 'info@inventaris.com') ?>" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="tax_percentage" class="form-label">Persentase Pajak (%)</label>
                <input type="number" class="form-control" id="tax_percentage" name="tax_percentage" value="<?= old('tax_percentage', session()->get('settings.tax_percentage') ?? '10') ?>" min="0" max="100" step="0.1">
                <div class="form-text">Digunakan untuk perhitungan pajak pada transaksi penjualan.</div>
            </div>
            
            <hr class="my-4">
            
            <h5 class="mb-3">Pengaturan Aplikasi</h5>
            
            <div class="mb-3">
                <label for="items_per_page" class="form-label">Jumlah Item per Halaman</label>
                <select class="form-select" id="items_per_page" name="items_per_page">
                    <option value="10" <?= (session()->get('settings.items_per_page') ?? '20') == '10' ? 'selected' : '' ?>>10</option>
                    <option value="20" <?= (session()->get('settings.items_per_page') ?? '20') == '20' ? 'selected' : '' ?>>20</option>
                    <option value="50" <?= (session()->get('settings.items_per_page') ?? '20') == '50' ? 'selected' : '' ?>>50</option>
                    <option value="100" <?= (session()->get('settings.items_per_page') ?? '20') == '100' ? 'selected' : '' ?>>100</option>
                </select>
                <div class="form-text">Jumlah item yang ditampilkan per halaman pada tabel.</div>
            </div>
            
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="enable_low_stock_alert" name="enable_low_stock_alert" value="1" <?= (session()->get('settings.enable_low_stock_alert') ?? '1') == '1' ? 'checked' : '' ?>>
                <label class="form-check-label" for="enable_low_stock_alert">
                    Aktifkan Notifikasi Stok Menipis
                </label>
                <div class="form-text">Menampilkan peringatan ketika stok produk di bawah batas minimal.</div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>