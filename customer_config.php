<?php 
require 'database.php';

if(!empty($_POST['edit_customer'])){
    $customer_id = $_POST['customer_id'];
    $query = "SELECT * FROM tblcustomer WHERE id='$customer_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_customer'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    $query = "INSERT INTO tblcustomer (fname, mname, lname, contactno, email, address) VALUES ( '$fname', '$mname', '$lname', '$contactno', '$email', '$address')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_customer'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $customer_id = $_POST['customer_id'];


    $query = "UPDATE tblcustomer SET fname='$fname', mname='$mname', lname='$lname', email='$email', contactno='$contactno', address='$address' WHERE id='$customer_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_customer'])) {
    $customer_id = $_POST['customer_id'];
    $query = "UPDATE tblcustomer SET isactive='0' WHERE id='$customer_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_customer'])) {
    $customer_id = $_POST['customer_id'];
    $query = "UPDATE tblcustomer SET isactive='1' WHERE id='$customer_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}
?>