<?php 
session_start();
include('./../assets/Include/header.php');
include('./../assets/Include/sidebar.php');
require('./../Config/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .form-container {
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
        .btn-custom {
            background-color: #ff9800;
            border: none;
        }
        .btn-custom:hover {
            background-color: #e68900;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Add Product</h2>
            <form action="./../Backend/product.php" method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="desc" placeholder="Enter product description" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Enter price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category" required>
                        <option value="">Select Category</option>
                        <?php
                        require('./../Config/config.php');
                         $query="SELECT cat_id,cat_name FROM Corona";
                         $res=mysqli_query($conn,$query) ;


                         if(mysqli_num_rows($res)>0){
                            while($row=mysqli_fetch_assoc($res)){
                            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."~</option>" ;    
                        }                    
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" class="form-control" name="qty" placeholder="Enter stock quantity" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-custom w-100" name="add">Add Product</button>
            </form>

            
        </div>
    </div>
</body>
</html>












<?php include("./../assets/Include/footer.php"); ?>