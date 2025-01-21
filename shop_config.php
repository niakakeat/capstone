<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location: index.php");
    die();
}
require 'database.php';


if (!empty($_POST['add_to_cart'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $user_id = $_SESSION['user_id'];
    $inventory_id = $_POST['inventory_id'];
    $quantity = 1;

    $select_tblcart = mysqli_query($conn, "Select * from `tblcart` where inventory_id='$inventory_id' AND user_id= '$user_id'");
    if (mysqli_num_rows($select_tblcart) > 0) {
        echo '<script type="text/javascript">
                alert("product already added to cart");
                window.location.href = "../shop.php";
            </script>';
        die();
    }else{
        // echo '<script type="text/javascript">
        //         alert("product added to cart");
        //         window.location.href = "../shop.php";
        //     </script>';
            
    }
   

    $query = "INSERT INTO tblcart (name, price, image, quantity,user_id, inventory_id) VALUES 
    ( '$name', '$price', '$image', '$quantity', '$user_id', '$inventory_id')";
    $query_run = mysqli_query($conn, $query);
    header("location: ../shop.php");
}

// $select_tblcart = mysqli_query($conn, "Select * from `tblcart`") or die ('query failed');
// $row_count = mysqli_num_rows($select_tblcart);



