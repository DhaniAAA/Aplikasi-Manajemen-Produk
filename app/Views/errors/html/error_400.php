<?php
// app/Views/errors/html/error_400.php

// Gunakan path absolut ke file layout
$pathToLayouts = __DIR__ . '/../../layouts/auth.php';

// Periksa apakah file layout ada sebelum mencoba untuk memasukkannya
if (file_exists($pathToLayouts)) {
    // Mulai output buffering untuk menangkap konten
    ob_start();
?>

<div class="text-center">
    <h1 class="display-1 fw-bold">400</h1>
    <p class="fs-3"> <span class="text-danger">Opps!</span> Permintaan Tidak Valid.</p>
    <p class="lead">
        Server tidak dapat memproses permintaan karena format yang salah.
    </p>
    <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary">Kembali ke Dashboard</a>
</div>

<?php
    // Ambil konten yang telah di-buffer
    $content = ob_get_clean();

    // Set variabel untuk layout
    $title = 'Permintaan Tidak Valid';

    // Render layout dengan konten yang dinamis
    include $pathToLayouts;
} else {
    // Fallback jika layout tidak ditemukan
    echo "Error: Layout file not found.";
}
?>
