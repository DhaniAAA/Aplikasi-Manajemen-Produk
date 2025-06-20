<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Nilai Inventaris</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data produk</td>
                </tr>
            <?php else: ?>
                <?php 
                $no = 1; 
                $totalInventoryValue = 0;
                foreach ($products as $product): 
                    $inventoryValue = $product['stock'] * $product['buy_price'];
                    $totalInventoryValue += $inventoryValue;
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $product['product_code'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category_name'] ?></td>
                        <td class="text-end"><?= number_format($product['stock'], 0, ',', '.') ?></td>
                        <td class="text-end">Rp <?= number_format($product['buy_price'], 0, ',', '.') ?></td>
                        <td class="text-end">Rp <?= number_format($inventoryValue, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="table-primary fw-bold">
                    <td colspan="6" class="text-end">Total Nilai Inventaris</td>
                    <td class="text-end">Rp <?= number_format($total_value, 0, ',', '.') ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="mt-3">
    <p><strong>Keterangan:</strong></p>
    <ul>
        <li>Nilai inventaris dihitung berdasarkan: Stok × Harga Beli</li>
        <li>Total nilai inventaris: Rp <?= number_format($total_value, 0, ',', '.') ?></li>
    </ul>
</div>