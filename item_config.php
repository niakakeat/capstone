<?php 
require 'database.php';

if(!empty($_POST['edit_item'])){
    $item_id = $_POST['item_id'];
    $query = "SELECT * FROM tblitem WHERE id='$item_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_item'])) {
    $description = $_POST['description'];
    $ename = $_POST['ename'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $query = "INSERT INTO tblitem (description, ename, price, type) VALUES ( '$description', '$ename', '$price', '$type')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_item'])) {
    $description = $_POST['description'];
    $ename = $_POST['ename'];  
    $price = $_POST['price'];
    $type = $_POST['type'];
    $item_id = $_POST['item_id'];


    $query = "UPDATE tblitem SET description='$description', ename='$ename', price='$price', type='$type'  WHERE id='$item_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_item'])) {
    $item_id = $_POST['item_id'];
    $query = "UPDATE tblitem SET status='0' WHERE id='$item_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_item'])) {
    $item_id = $_POST['item_id'];
    $query = "UPDATE tblitem SET status='1' WHERE id='$item_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}
?>