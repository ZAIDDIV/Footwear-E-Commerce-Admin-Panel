<?php
include('./../assets/Include/header.php');
include('./../assets/Include/sidebar.php');
require('./../Config/config.php');

// 1. Handle Clear All Categories
if (isset($_POST['clear_all'])) {
    $deleteQuery = "DELETE FROM corona";
    if (mysqli_query($conn, $deleteQuery)) {
        // We use a Refresh header to clear the POST data and reload the page state
        echo "<script>
                alert('All categories have been deleted!');
                window.location.href = 'category.php'; 
              </script>";
        exit(); // Stop execution here so the rest of the page loads fresh via the redirect
    } else {
        echo "<script>alert('Error deleting categories!');</script>";
    }
}

// 2. Fetch categories 
// This query runs fresh every time the page loads
$query = "SELECT * FROM corona";
$result = mysqli_query($conn, $query);
?>
<style>
    .container {
        margin-top: 90px;
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        border-radius: 12px 12px 0 0;
    }

    .btn-primary, .btn-danger {
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    .btn-danger:hover {
        background: #c82333;
    }

    .table {
        background: #fff;
        border-radius: 10px;
    }

    .table thead {
        background: #343a40;
        color: white;
    }

    .table tbody tr {
        transition: background 0.3s ease-in-out;
    }

    .table tbody tr:hover {
        background: #f8f9fa;
    }

    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        border-radius: 10px 10px 0 0;
    }

    .btn-success:hover {
        background: #218838;
    }

</style>

<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2>📂 Category Management</h2>
            <div>
                <a href="/Corona Admin Panel/Admin/category/add_category.php" class="btn btn-primary">
                    ➕ Add Category
                </a>
                <form method="POST" class="d-inline">
                    <button type="submit" name="clear_all" class="btn btn-danger">🗑️ Clear All Categories</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
              <tbody>
    <?php
    $sn = 0;
    // Check if there are any categories to display
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sn++;
    ?>
        <tr class="align-middle">
            <td><?= $sn ?></td>
            <td><?= $row['cat_name'] ?></td>
            <td>
                <img src="./../img/<?= $row['cat_img'] ?>" width="70" height="70" class="rounded shadow">
            </td>
            <td>
                <a href="./../Backend/category.php?delete_id=<?= $row['cat_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">
                    <i class="fas fa-trash-alt"></i> Delete
                </a>
            </td>
            <td>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['cat_id'] ?>">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </td>
        </tr>

        <div class="modal fade" id="editModal<?= $row['cat_id'] ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="./../Backend/category.php?update_id=<?= $row['cat_id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">✏️ Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $row['cat_name'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                <img src="./../img/<?= $row['cat_img'] ?>" width="100" height="100" class="rounded shadow mb-2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload New Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="sub" value="💾 Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php 
        } // End while loop
    } else { 
        // If no data exists, show this clean message
        echo "<tr><td colspan='5' class='py-4 text-center text-muted'>No categories available.</td></tr>";
    } 
    ?>
</tbody>
            </table>
        </div>
    </div>
</div>

<?php
include("./../assets/Include/footer.php");
?>
