<?php
session_start();
require('./../Config/config.php');

// Add Category
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $path = './../img/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $path);

    // Check for duplicate
    $check_query = "SELECT * FROM corona WHERE cat_name = '$name'";
    $check_res = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_res) > 0) {
        $_SESSION['duplicate'] = array(
            'type' => 'light',
            'message' => 'Duplicate Data Not allowed'
        );
        header('location:./../category/add_category.php');
        die();
    } else {
        $query = "INSERT INTO corona (cat_name, cat_img) VALUES ('$name', '$image')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            header('location:./../category/view_category.php');
        } else {
            header('location:./../category/add_category.php');
        }
    }
}

// Delete Category
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "DELETE FROM corona WHERE cat_id = '$id'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        header('location:./../category/view_category.php');
    }
}

// Update Category
if (isset($_POST['sub']) && isset($_GET['update_id']) && $_GET['update_id'] != "") {
    $id = $_GET['update_id'];
    $name = $_POST['name'];

    if (!empty($_FILES['image']['name'])) {
        $imagename = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = './../img/' . $imagename;
        move_uploaded_file($tmp, $path);
        $update_query = "UPDATE corona SET cat_name='$name', cat_img='$imagename' WHERE cat_id='$id'";
    } else {
        $update_query = "UPDATE corona SET cat_name='$name' WHERE cat_id='$id'";
    }

    $res = mysqli_query($conn, $update_query);
    if ($res) {
        header("location:./../category/view_category.php");
    }
}
?>
