<?php
include '../includes/db.php';

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Product Management</h2>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <?php if(!empty($row['image'])): ?>
                                <img src="/E-Commerce-Web/admin/assets/uploads/<?= htmlspecialchars($row['image']) ?>"
                                    width="60" height="60" class="img-thumbnail">
                                <?php else: ?>
                                <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td class="text-truncate" style="max-width: 200px;">
                                <?= htmlspecialchars($row['description']) ?>
                            </td>
                            <td><?= htmlspecialchars($row['category']) ?></td>
                            <td><strong>₱<?= number_format($row['price'], 2) ?></strong></td>
                            <td><?= $row['stock'] ?></td>
                            <td>
                                <span class="badge badge-<?= $row['status'] == 'active' ? 'success' : 'secondary' ?>">
                                    <?= ucfirst($row['status']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="add_product.php" class="btn btn-sm btn-primary ms-2" title="Add Product">
                                    <i class="bi bi-plus-lg"></i>
                                </a>
                                <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="../actions/delete_product.php?id=<?= $row['id'] ?>"
                                    onclick="return confirm('Delete this product?')" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">No products found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>