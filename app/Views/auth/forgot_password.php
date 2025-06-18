<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="card-body">
    <h5 class="card-title text-center mb-4">Lupa Password</h5>

    <!-- Tampilkan pesan sukses/error -->
    <?php if(session()->getFlashdata('message')): ?>
        <div class="alert alert-info" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('forgot-password') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email terdaftar Anda" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Kirim Link Reset</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="mb-0"><a href="<?= base_url('login') ?>">Kembali ke Halaman Login</a></p>
    </div>
</div>
<?= $this->endSection() ?>
