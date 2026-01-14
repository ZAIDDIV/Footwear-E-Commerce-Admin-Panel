<?php
include('./assets/Include/header.php');
require('./Admin/Config/config.php'); // Adjust the path as needed

// Fetch all categories from 'corona' table
$query = "SELECT * FROM corona";
$result = mysqli_query($conn, $query);
?>

<style>
    .category-card {
        background: #1e1e2f;
        border-radius: 12px;
        padding: 20px;
        color: white;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    }

    .category-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }
</style>

<div class="container my-5">
    <h2 class="text-white text-center mb-4">Main Categories</h2>
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-md-4 mb-4">
                    <div class="category-card">
                        <img src="./Admin/img/<?= $row['cat_img'] ?>" class="category-img" alt="<?= $row['cat_name'] ?>">
                        <h4><?= $row['cat_name'] ?></h4>
                        <!-- Optional: Add link to category page -->
                        <a href="products.php?category=<?= $row['cat_id'] ?>" class="btn btn-outline-light mt-3">View Products</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p class="text-white text-center">No categories available.</p>';
        }
        ?>
    </div>
</div>

<?php
include('./assets/Include/footer.php');
?>
