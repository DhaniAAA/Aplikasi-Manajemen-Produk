<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Detail Produk</h4>
    <div>
        <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= base_url('products/delete/' . $product['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="<?= base_url('uploads/' . ($product['image'] ?? 'default.jpg')) ?>" alt="<?= esc($product['name']) ?>" class="img-fluid rounded mb-3" style="max-height: 250px;">
            </div>
            <div class="col-md-8">
                <h5><?= esc($product['name']) ?></h5>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p><strong>Kode:</strong> <?= esc($product['code']) ?></p>
                        <p><strong>Kategori:</strong> <?= esc($product['category_name']) ?></p>
                    </div>
                    <div class="col-6">
                        <p><strong>Stok Saat Ini:</strong> <?= esc($product['stock']) ?></p>
                        <p><strong>Harga Jual:</strong> Rp <?= number_format($product['price'], 0, ',', '.') ?></p>
                    </div>
                </div>
                <h6><strong>Deskripsi:</strong></h6>
                <p><?= esc($product['description']) ?: 'Tidak ada deskripsi.' ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">Riwayat Stok</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($stock_history)) : ?>
                        <?php foreach ($stock_history as $history) : ?>
                            <tr>
                                <td><?= date('d/m/Y H:i', strtotime($history['created_at'])) ?></td>
                                <td>
                                    <span class="badge bg-<?= $history['type'] == 'in' ? 'success' : 'danger' ?>">
                                        <?= $history['type'] == 'in' ? 'Masuk' : 'Keluar' ?>
                                    </span>
                                </td>
                                <td><?= esc($history['quantity']) ?></td>
                                <td><?= esc($history['description']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada riwayat stok.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>