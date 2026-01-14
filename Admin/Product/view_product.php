<?php 
session_start();
include('./../assets/Include/header.php');
include('./../assets/Include/sidebar.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
        }
        .table-container {
            background: #1e1e2e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .table {
            color: #ffffff;
        }
        .table thead {
            background-color: #2c2c3e;
        }
        .btn-custom {
            background-color: #ff9800;
            border: none;
        }
        .btn-custom:hover {
            background-color: #e68900;
        }
        .img-thumb {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<?php
require('./../Config/config.php');

$query = "SELECT product.p_id, product.p_name, product.p_price, product.p_desc, product.p_image, product.p_qty, corona.cat_name 
FROM product 
JOIN corona ON product.cat_id = corona.cat_id";
$res = mysqli_query($conn, $query);
?>
<body>
    <div class="container">
        <div class="table-container">
            <h2 class="text-center mb-4">View Products</h2>
            <table class="table table-bordered table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn=0;
                    if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            $sn++;
                    ?>
                    <tr>
                        <td><?= $sn ?></td>
                        <td><?= $row['cat_name'] ?></td>
                        <td><?= $row['p_name'] ?></td>
                        <td><?= $row['p_qty'] ?></td>
                        <td>$s<?= $row['p_price'] ?></td>
                        <td><?= $row['p_desc'] ?></td>
                        <td><img src="./../img/<?= $row['p_image'] ?>" class="img-thumb" alt="Product Image"></td>
                        <td>
                            <a href="edit_product.php?id=<?= $row['p_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete_product.php?id=<?= $row['p_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php include("./../assets/Include/footer.php"); ?>
