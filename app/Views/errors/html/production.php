<?php
// app/Views/errors/html/production.php

// Gunakan path absolut ke file layout
$pathToLayouts = __DIR__ . '/../../layouts/auth.php';

// Periksa apakah file layout ada sebelum mencoba untuk memasukkannya
if (file_exists($pathToLayouts)) {
    // Mulai output buffering untuk menangkap konten
    ob_start();
?>

<div class="text-center">
    <h1 class="display-3 fw-bold text-danger">Terjadi Kesalahan</h1>
    <p class="fs-4">Kami mengalami sedikit kendala teknis.</p>
    <p class="lead">
        Silakan coba lagi nanti atau hubungi dukungan jika masalah berlanjut.
    </p>
    <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary">Kembali ke Dashboard</a>
</div>

<?php
    // Ambil konten yang telah di-buffer
    $content = ob_get_clean();

    // Set variabel untuk layout
    $title = 'Terjadi Kesalahan';

    // Render layout dengan konten yang dinamis
    include $pathToLayouts;
} else {
    // Fallback jika layout tidak ditemukan
    echo "Error: Layout file not found.";
}
?>
