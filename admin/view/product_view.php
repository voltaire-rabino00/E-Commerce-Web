<?php
// Example usage of ProductController in a view
include_once __DIR__ . '/../controller/product_controller.php';
include_once __DIR__ . '/../includes/db.php';

$productController = new ProductController($conn);
$products = $productController->getAllProducts();
?>
<div class="container-fluid">
    <h2 class="mb-4">Product Management</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td>
                        <?php if(!empty($product->image)): ?>
                        <img src="/E-Commerce-Web/admin/assets/uploads/<?= htmlspecialchars($product->image) ?>"
                            width="60" height="60" class="img-thumbnail">
                        <?php else: ?>
                        <span class="text-muted">No image</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($product->name) ?></td>
                    <td><?= htmlspecialchars($product->description) ?></td>
                    <td><?= htmlspecialchars($product->category) ?></td>
                    <td>₱<?= number_format($product->price, 2) ?></td>
                    <td><?= $product->stock ?></td>
                    <td>
                        <span class="badge bg-<?= $product->status == 'active' ? 'success' : 'secondary' ?>">
                            <?= ucfirst($product->status) ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="add_product.php" class="btn btn-sm btn-primary ms-2" title="Add Product">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                            <a href="edit_product.php?id=<?= $product->id ?>" class="btn btn-sm btn-warning"
                                title="Edit Product">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="../actions/delete_product.php?id=<?= $product->id ?>"
                                onclick="return confirm('Delete this product?')" class="btn btn-sm btn-danger"
                                title="Delete Product">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>