<div class="row">
    <!-- Total Produk -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-0">Total Produk</h6>
                        <h2 class="mt-2 mb-0"><?= number_format($total_products) ?></h2>
                    </div>
                    <div class="bg-primary rounded-circle p-3">
                        <i class="fas fa-box fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stok Menipis -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-0">Stok Menipis</h6>
                        <h2 class="mt-2 mb-0"><?= number_format($low_stock_products) ?></h2>
                    </div>
                    <div class="bg-warning rounded-circle p-3">
                        <i class="fas fa-exclamation-triangle fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Hari Ini -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-0">Transaksi Hari Ini</h6>
                        <h2 class="mt-2 mb-0">0</h2>
                    </div>
                    <div class="bg-success rounded-circle p-3">
                        <i class="fas fa-exchange-alt fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aktivitas Terbaru -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Aktivitas Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Pengguna</th>
                                <th>Aktivitas</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_activities as $activity): ?>
                            <tr>
                                <td><?= date('d/m/Y H:i', strtotime($activity['created_at'])) ?></td>
                                <td><?= esc($activity['user_name']) ?></td>
                                <td><?= esc($activity['activity']) ?></td>
                                <td><?= esc($activity['ip_address']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($recent_activities)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada aktivitas</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 