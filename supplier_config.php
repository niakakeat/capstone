<?php 
require 'database.php';

if(!empty($_POST['edit_supplier'])){
    $supplier_id = $_POST['supplier_id'];
    $query = "SELECT * FROM tblsupplier WHERE id='$supplier_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_supplier'])) {
    $supplier = $_POST['supplier'];
    $person = $_POST['person'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $query = "INSERT INTO tblsupplier (supplier, person, address, contactno) VALUES ( '$supplier', '$person', '$address', '$contactno')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_supplier'])) {
    $supplier = $_POST['supplier'];
    $person = $_POST['person'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $supplier_id = $_POST['supplier_id'];


    $query = "UPDATE tblsupplier SET supplier='$supplier', person='$person', address='$address', contactno='$contactno' WHERE id='$supplier_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_supplier'])) {
    $supplier_id = $_POST['supplier_id'];
    $query = "UPDATE tblsupplier SET status='0' WHERE id='$supplier_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_supplier'])) {
    $supplier_id = $_POST['supplier_id'];
    $query = "UPDATE tblsupplier SET status='1' WHERE id='$supplier_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}
?>