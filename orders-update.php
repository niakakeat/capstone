<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

require_once "config/database.php";

if(isset($_SESSION['select_tblcart'])) {

  $total = 0;

  foreach($_SESSION['select_tblcart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM tblitem WHERE id = ".$product_id);

    if($result){

      if($obj = $result->fetch_cart()) {


        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];

        $query = $mysqli->query("INSERT INTO orders (description, ename, price, email) VALUES('$obj->description', '$obj->ename', '$obj->price', $obj->type, '$user')");

        if($query){
          $newqty = $obj->qty - $quantity;
          if($mysqli->query("UPDATE tblitem SET qty = ".$newqty." WHERE id = ".$product_id)){

          }
        }

      



      }
    }
  }
}

unset($_SESSION['select_tblcart']);
header("location:success.php");

?>
