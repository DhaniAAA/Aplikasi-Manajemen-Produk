<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0"><?= isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' ?></h5>
    </div>
    <div class="card-body">
                <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= isset($product) ? base_url('products/' . $product['id']) : base_url('products') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php if (isset($product)) : ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="code" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" id="code" name="code" value="<?= old('code', $product['code'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $product['name'] ?? '') ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>" <?= (old('category_id', $product['category_id'] ?? '') == $category['id']) ? 'selected' : '' ?>>
                            <?= esc($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="buy_price" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control" id="buy_price" name="buy_price" value="<?= old('buy_price', $product['buy_price'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sell_price" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control" id="sell_price" name="sell_price" value="<?= old('sell_price', $product['sell_price'] ?? '') ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="<?= old('stock', $product['stock'] ?? 0) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="min_stock" class="form-label">Stok Minimal</label>
                    <input type="number" class="form-control" id="min_stock" name="min_stock" value="<?= old('min_stock', $product['min_stock'] ?? '') ?>">
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