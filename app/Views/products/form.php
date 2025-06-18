<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0"><?= isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= isset($product) ? base_url('products/update/' . $product['id']) : base_url('products') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php if (isset($product)) : ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $product['name'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?= old('stock', $product['stock'] ?? 0) ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?= old('price', $product['price'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="purchase_price" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="<?= old('purchase_price', $product['purchase_price'] ?? '') ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= old('description', $product['description'] ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <input class="form-control" type="file" id="image" name="image">
                <?php if (isset($product) && $product['image']) : ?>
                    <img src="<?= base_url('uploads/' . $product['image']) ?>" alt="<?= esc($product['name']) ?>" class="img-thumbnail mt-2" width="150">
                <?php endif; ?>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?= base_url('products') ?>" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>