<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Jumlah Item</th>
                <th>Keterangan</th>
                <th>Pengguna</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($transactions)): ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data transaksi pada periode yang dipilih</td>
                </tr>
            <?php else: ?>
                <?php 
                $no = 1; 
                $stockInCount = 0;
                $stockOutCount = 0;
                foreach ($transactions as $transaction): 
                    if ($transaction['type'] == 'in') {
                        $stockInCount++;
                    } else {
                        $stockOutCount++;
                    }
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $transaction['transaction_code'] ?></td>
                        <td><?= date('d/m/Y', strtotime($transaction['date'])) ?></td>
                        <td>
                            <?php if ($transaction['type'] == 'in'): ?>
                                <span class="badge bg-success">Stok Masuk</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Stok Keluar</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end"><?= number_format($transaction['total_items'], 0, ',', '.') ?></td>
                        <td><?= $transaction['notes'] ?></td>
                        <td><?= $transaction['user_name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if (!empty($transactions)): ?>
<div class="mt-3">
    <p><strong>Ringkasan Transaksi:</strong></p>
    <ul>
        <li>Total Transaksi: <?= count($transactions) ?></li>
        <li>Transaksi Stok Masuk: <?= $stockInCount ?></li>
        <li>Transaksi Stok Keluar: <?= $stockOutCount ?></li>
        <li>Periode: <?= date('d/m/Y', strtotime($start_date)) ?> - <?= date('d/m/Y', strtotime($end_date)) ?></li>
    </ul>
</div>
<?php endif; ?>