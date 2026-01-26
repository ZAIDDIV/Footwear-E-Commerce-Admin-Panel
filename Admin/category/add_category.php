<?php 
session_start();
include('./../assets/Include/header.php');
include('./../assets/Include/sidebar.php');
?>

<!-- 🔹 IMPORTANT: We now follow Corona Admin layout -->
<div class="main-panel">
  <div class="content-wrapper">

    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        }
        .card-header {
            background: linear-gradient(135deg, #ff8a00, #e52e71);
            border-radius: 12px 12px 0 0;
        }
        .form-control {
            background-color: #252525;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            background-color: #333;
            box-shadow: none;
        }
        .btn-custom {
            width: 45%;
            padding: 10px;
            transition: transform 0.2s ease-in-out;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .btn-custom {
                width: 100%;
            }
        }
    </style>

    <!-- 🔹 Your content now lives inside content-wrapper -->
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div class="card shadow-lg">
            <div class="card-header text-white d-flex justify-content-between align-items-center">
                <h2>➕ Add Category</h2>
                <a href="/Corona Admin Panel/Admin/category/view_category.php" class="btn btn-warning">
                    📂 View Categories
                </a>
            </div>

            <?php if(isset($_SESSION['duplicate'])): ?>
                <div class="alert alert-<?= $_SESSION['duplicate']['type'] ?> text-center fw-bold mx-3 mt-3 fade show" role="alert">
                    <?= $_SESSION['duplicate']['message'] ?>
                </div>
                <?php unset($_SESSION['duplicate']); ?>
            <?php endif; ?>

            <div class="card-body">
                <form action="./../Backend/category.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="fw-bold">📌 Category Name</label>
                            <input class="form-control mt-2" type="text" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">📷 Upload Image</label>
                            <input class="form-control mt-2" type="file" name="image" required>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" name="submit" class="btn btn-success btn-custom">✅ Add Category</button>
                            <a href="/Corona Admin Panel/Admin/index.php" class="btn btn-secondary btn-custom">⬅️ Dashboard</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".btn-custom").forEach(btn => {
            btn.addEventListener("mouseenter", () => btn.classList.add("shadow-lg"));
            btn.addEventListener("mouseleave", () => btn.classList.remove("shadow-lg"));
        });
    });
</script>

<?php include("./../assets/Include/footer.php"); ?>
