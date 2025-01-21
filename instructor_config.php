<?php 
require 'database.php';

if(!empty($_POST['edit_instructor'])){
    $instructor_id = $_POST['instructor_id'];
    $query = "SELECT * FROM tblinstructor WHERE id='$instructor_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_instructor'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    $query = "INSERT INTO tblinstructor (fname, mname, lname, contactno, email, address) VALUES ( '$fname', '$mname', '$lname', '$contactno', '$email', '$address')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_instructor'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $instructor_id = $_POST['instructor_id'];


    $query = "UPDATE tblinstructor SET fname='$fname', mname='$mname', lname='$lname', email='$email', contactno='$contactno', address='$address' WHERE id='$instructor_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_instructor'])) {
    $instructor_id = $_POST['instructor_id'];
    $query = "UPDATE tblinstructor SET status='0' WHERE id='$instructor_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_instructor'])) {
    $instructor_id = $_POST['instructor_id'];
    $query = "UPDATE tblinstructor SET status='1' WHERE id='$instructor_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}
?>