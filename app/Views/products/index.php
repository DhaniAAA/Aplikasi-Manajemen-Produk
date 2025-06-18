<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Produk</h5>
            <a href="<?= base_url('products/new') ?>" class="btn btn-primary btn-sm">Tambah Produk</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= esc($product['code']) ?></td>
                                <td><?= esc($product['name']) ?></td>
                                <td><?= esc($product['stock']) ?></td>
                                <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                                <td><?= esc($product['category_name']) ?></td>
                                <td class="text-end">
                                    <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?= base_url('products/delete/' . $product['id']) ?>" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada produk yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            <?php // echo $pager->links() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>