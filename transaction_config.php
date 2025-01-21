<?php
require 'database.php';

if (!empty($_POST['edit_transaction'])) {
    $transaction_id = $_POST['transaction_id'];
    $query = "SELECT * FROM tbltransaction WHERE id='$transaction_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    $query_details = "select *, ti.id as pk_id from tbltransaction_itemlisting ti left join tblitem item on ti.item_id = item.id WHERE item.status = 1 ";
    $result_details = mysqli_query($conn, $query_details);
    $itemdata = [];
    while ($detail_data = mysqli_fetch_assoc($result_details)) {
        $itemdata[] = $detail_data;
    }

    echo json_encode([
        'data' => $row,
        'details_data' => $itemdata
    ]);
}

if (!empty($_POST['is_add_transaction'])) {
    $receipt = $_POST['receipt'];
    $payment = $_POST['payment'];
    $customer = $_POST['customer'];
    $date = $_POST['date'];
    $itemlisting_array = $_POST['itemlisting_array'];

    $query = "INSERT INTO tbltransaction (receipt, payment, customer, date ) VALUES ( '$receipt', '$payment', '$customer', '$date')";
    $query_run = mysqli_query($conn, $query);
    $last_id = mysqli_insert_id($conn);
    if (!empty($itemlisting_array)) {
        foreach ($itemlisting_array as $row) {
            $query = "INSERT INTO tbltransaction_itemlisting (ename, qty, price, mainid, item_id ) VALUES ( '".$row['ename']."', '".$row['qty']."', '".$row['price']."', '$last_id' , '".$row['item_id']."')" ;
            $query_run = mysqli_query($conn, $query);
        }
    }


    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_transaction'])) {
    $receipt = $_POST['receipt'];
    $payment = $_POST['payment'];
    $customer = $_POST['customer'];
    $date = $_POST['date'];

    $transaction_id = $_POST['transaction_id'];


    $query = "UPDATE tbltransaction SET receipt='$receipt', payment='$payment', customer='$customer', date='$date' WHERE id='$transaction_id' ";
    $query_run = mysqli_query($conn, $query);
    $itemlisting_array = $_POST['itemlisting_array'];

   
    if (!empty($itemlisting_array)) {
        foreach ($itemlisting_array as $row) {
            if(!empty($row['pk_id'])){
                $query = "UPDATE  tbltransaction_itemlisting SET qty= ".$row['qty']." WHERE id=".$row['pk_id'];
                $query_run = mysqli_query($conn, $query);
            }else{
                $query = "INSERT INTO tbltransaction_itemlisting (ename, qty, price, mainid, item_id ) VALUES ( '".$row['ename']."', '".$row['qty']."', '".$row['price']."', '$transaction_id' , '".$row['item_id']."')" ;
            $query_run = mysqli_query($conn, $query);
            }

            
        }
    }
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_transaction'])) {
    $transaction_id = $_POST['transaction_id'];
    $query = "UPDATE tbltransaction SET status='0' WHERE id='$transaction_id' ";
    $query_run = mysqli_query($conn, $query);


    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_transaction'])) {
    $transaction_id = $_POST['transaction_id'];
    $query = "UPDATE tbltransaction SET status='1' WHERE id='$transaction_id' ";
    $query_run = mysqli_query($conn, $query);


    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}

if (!empty($_POST['is_get_item_listing'])) {
    $query = "select * from tblitem WHERE status = 1 ";
    $result = mysqli_query($conn, $query);
    $itemdata = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $itemdata[] = $row;
    }

    echo json_encode([
        'data' => $itemdata
    ]);
}
