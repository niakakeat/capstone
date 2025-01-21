<?php
require 'database.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// die();

if (!empty($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $query = "SELECT * FROM user WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['isdelete_user'])) {
    $user_id = $_POST['user_id'];
    $query = "UPDATE user SET isactive='0' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_user'])) {
    $user_id = $_POST['user_id'];
    $query = "UPDATE user SET isactive='1' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}

if (!empty($_POST['is_edit'])) {
    $user_id = $_POST['user_id'];
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];
    $email = $_POST['email'];
    $image = $_POST['image'];


    $query = "UPDATE user SET uname='$uname', upass='$upass', email='$email' image='$image' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
