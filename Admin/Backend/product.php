<?php

require('./../Config/config.php');

if(isset($_POST['add'])){
    $id=$_POST['category'];
    $name=$_POST['name'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];
    $image=$_FILES['image']['name'];
    $path='./../img/'.$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $path);

    $query="INSERT INTO product(cat_id,p_name,p_qty,p_price,p_desc,p_image)VALUES('".$id."','".$name."','".$qty."','".$price."','".$desc."','".$image."')";
    $res=mysqli_query($conn, $query);


    if($res){
        header('location:./../product/view_product.php');
    }else{
        header('location:./../product/add_product.php');

    }
}

if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];
    $query = "DELETE FROM product WHERE cat_id = '$id'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        header('location:./../category/view_product.php');
    }
}
?>

