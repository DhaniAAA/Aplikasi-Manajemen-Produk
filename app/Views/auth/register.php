<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="card-body">
    <h5 class="card-title text-center mb-4">Daftar Akun Baru</h5>

    <!-- Tampilkan pesan error validasi -->
    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('register') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirm" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="mb-0">Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk di sini</a></p>
    </div>
</div>
<?= $this->endSection() ?>
