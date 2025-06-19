<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0"><?= $title ?></h5>
            <a href="<?= base_url('categories/new') ?>" class="btn btn-primary btn-sm">Tambah Kategori</a>
        </div>
    </div>
    <div class="card-body">
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= esc($category['name']) ?></td>
                            <td><?= esc($category['description']) ?></td>
                            <td>
                                <a href="<?= base_url('categories/edit/' . $category['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= base_url('categories/' . $category['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
