document.addEventListener('DOMContentLoaded', function () {
    // --- Logic for Stock In Form ---
    const addStockInItemBtn = document.getElementById('add-stock-in-item');
    const stockInItemsContainer = document.getElementById('stock-in-items');
    let stockInIndex = 0;

    if (addStockInItemBtn) {
        addStockInItemBtn.addEventListener('click', function () {
            const newItem = document.createElement('div');
            newItem.classList.add('row', 'mb-3', 'align-items-center');
            newItem.innerHTML = `
                <div class="col-md-5">
                    <select class="form-select" name="items[${stockInIndex}][product_id]" required>
                        <option value="">Pilih Produk...</option>
                        <!-- Product options will be loaded here, possibly via AJAX -->
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="items[${stockInIndex}][quantity]" placeholder="Jumlah" required min="1">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="items[${stockInIndex}][description]" placeholder="Keterangan">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm remove-item">&times;</button>
                </div>
            `;
            stockInItemsContainer.appendChild(newItem);
            stockInIndex++;
        });
    }

    // --- Logic for Stock Out Form ---
    const addStockOutItemBtn = document.getElementById('add-stock-out-item');
    const stockOutItemsContainer = document.getElementById('stock-out-items');
    let stockOutIndex = 0;

    if (addStockOutItemBtn) {
        addStockOutItemBtn.addEventListener('click', function () {
            const newItem = document.createElement('div');
            newItem.classList.add('row', 'mb-3', 'align-items-center');
            newItem.innerHTML = `
                <div class="col-md-5">
                    <select class="form-select" name="items[${stockOutIndex}][product_id]" required>
                        <option value="">Pilih Produk...</option>
                        <!-- Product options will be loaded here, possibly via AJAX -->
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="items[${stockOutIndex}][quantity]" placeholder="Jumlah" required min="1">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="items[${stockOutIndex}][description]" placeholder="Keterangan">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm remove-item">&times;</button>
                </div>
            `;
            stockOutItemsContainer.appendChild(newItem);
            stockOutIndex++;
        });
    }

    // --- Logic to Remove Item (works for both forms) ---
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            e.target.closest('.row').remove();
        }
    });
});
