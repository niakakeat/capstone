<?php 
require 'database.php';

if(!empty($_POST['edit_category'])){
    $category_id = $_POST['category_id'];
    $query = "SELECT * FROM tblcategory WHERE id='$category_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_category'])) {
    $Category_name = $_POST['Category_name'];
    $query = "INSERT INTO tblcategory (name) VALUES ( '$Category_name')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_category'])) {
    $Category_name = $_POST['Category_name'];
    $category_id = $_POST['category_id'];


    $query = "UPDATE tblcategory SET name='$Category_name' WHERE id='$category_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_category'])) {
    $category_id = $_POST['category_id'];
    $query = "UPDATE tblcategory SET status='0' WHERE id='$category_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_category'])) {
    $category_id = $_POST['category_id'];
    $query = "UPDATE tblcategory SET status='1' WHERE id='$category_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}
?>