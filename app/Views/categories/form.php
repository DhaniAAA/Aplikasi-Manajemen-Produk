<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0"><?= $title ?></h5>
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

        <form action="<?= isset($category) ? base_url('categories/' . $category['id']) : base_url('categories') ?>" method="post">
            <?= csrf_field() ?>
            <?php if (isset($category)) : ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $category['name'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= old('description', $category['description'] ?? '') ?></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?= base_url('categories') ?>" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
