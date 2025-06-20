<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data produk</td>
                </tr>
            <?php else: ?>
                <?php $no = 1;
                foreach ($products as $product): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $product['code'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category_name'] ?></td>
                        <td class="text-end"><?= number_format($product['stock'], 0, ',', '.') ?></td>
                        <td><?= $product['unit'] ?></td>
                        <td>
                            <?php if ($product['stock'] <= 0): ?>
                                <span class="badge bg-danger">Habis</span>
                            <?php elseif ($product['stock'] <= $product['min_stock']): ?>
                                <span class="badge bg-warning text-dark">Stok Rendah</span>
                            <?php else: ?>
                                <span class="badge bg-success">Tersedia</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="mt-3">
    <p><strong>Keterangan:</strong></p>
    <ul>
        <li><span class="badge bg-success">Tersedia</span> - Stok produk masih mencukupi</li>
        <li><span class="badge bg-warning text-dark">Stok Rendah</span> - Stok produk di bawah batas minimum</li>
        <li><span class="badge bg-danger">Habis</span> - Stok produk habis</li>
    </ul>
</div>