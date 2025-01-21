<?php
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "staff") {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/employee.css?v=<?php echo time(); ?>">
</head>



<body>

    <div class="banner">
        <div class="navbar">
            <ul>
                <li><a href="employee.php">Home</a></li>
                <li><a href="employee_scheduling.php" style="--clr:#">Schedule</a></li>
                <li>
                    <div class="dropdown" style="--clr:#">
                        <a href="" class="dropbtn">Maintenance</a>
                        <div class="dropdown-content">
                            <a href="employee_customer.php" style="--clr:#">Customer</a>
                            <a href="employee_userlist.php" style="--clr:#">User</a>
                            <a href="employee_instructor.php" style="--clr:#">Instructor</a>
                            <a href="employee_supplier.php" style="--clr:#">Supplier</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="" class="dropbtn">Product Maintenance</a>
                        <div class="dropdown-content">
                            <a href="employee_item.php">Product</a>
                            <a href="employee_product_category.php">Product Category</a>
                        </div>
                    </div>
                </li>
                <li><a href="employee_inventory.php" style="--clr:#">Inventory</a></li>
                <!-- <li><a href="employee_transaction.php" style="--clr:#">Transaction</a></li> -->
                </ul>
            <img src="images/profile.jpg" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="images/profile.jpg" alt="">
                        <h2>Rafael C. Las Marias</h2>
                    </div>
                    <hr>
                    <a href="editprofile.php" class="sub-menu-link">
                    <p><img src="images/edit.png"> Edit Profile<span>></span></p>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                    <p><img src="images/logout.webp"> Logout <span style="margin-left: 120px;">></span></p>

                    </a>
                </div>
            </div>
            <div class="clock">
                <span id="hours">00</span>
                <span>:</span>
                <span id="min">00</span>
                <span>:</span>
                <span id="sec">00</span>
            </div>
        </div>
    </div>
    <?php require_once "config/database.php";
    $query = "select * from tbltransaction ";
    $result = mysqli_query($conn, $query)

    ?>


    <style>

    </style>


    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: black;">TRANSACTIONS </div>
            <div class="panel-body">
                <button type="button" id="add_transaction"><i class="fas fa-plus"></i> New Transaction</button>
                <table id="myTable" class="table table-condensed text-center">
                    <thead>
                        <tr class="">
                            <td> SN</td>
                            <td> Receipt No </td>
                            <td> Mode Of Payment </td>
                            <td> Customer </td>
                            <td> Date </td>
                            <td> STATUS </td>
                            <td style="width: 5%;"> Edit </td>
                            <td style="width: 5%;"> </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['receipt'] ?></td>
                                <td><?php echo $row['payment'] ?></td>
                                <td><?php echo $row['customer'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['status'] == 1 ? "completed" : "incomplete" ?></td>
                                <!-- <td><a href="register-edit.php?id=" class="btn-btn-primary">Edit</a></td> -->
                                <td><button type="button" transaction_id="<?= $row['id']; ?>" style="background-color: #00b6ff;" class="edit_transaction">Edit</button></td>
                                <?php if ($row['status'] == 1) : ?>
                                    <td><button type="button" transaction_id="<?= $row['id']; ?>" style="background-color: #d9534f;" class="deactivate_transaction">Incomplete</button></td>
                                <?php else : ?>
                                    <td><button type="button" transaction_id="<?= $row['id']; ?>" style="background-color: #3cb371;" class="activate_transaction">Completed</button></td>
                                <?php endif; ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="add_transaction_modal">
        <div class="modal-dialog" style="width: 90%;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Transaction</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="config/transaction.php" method="POST">
                        <input type="hidden" name="transaction_id" id="transaction_id">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Main Details </div>
                                    <div class="panel-body">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Receipt No</label>
                                            <input type="text" name="name" id="receipt" class="form-control inputs">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer</label>
                                            <input type="text" name="name" id="customer" class="form-control inputs">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Date</label>
                                            <input type="date" name="name" id="date" class="form-control inputs">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Mode Of Payment</label>
                                            <select name="name" id="payment" class="form-control inputs">
                                                <option value="Gcash">Gcash</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Item Details </div>
                                    <div class="panel-body">
                                        <button type="button" id="add_item"><i class="fas fa-plus"></i> Add Item</button>
                                        <table id="itemlisting_table" class="table table-condensed text-center">
                                            <thead>
                                                <tr class="">
                                                    <td> Item Name</td>
                                                    <td style="width: 10%"> Qty</td>
                                                    <td> Amount </td>
                                                    <td style="width: 5%;"> </td>
                                                </tr>
                                            </thead>
                                            <tbody id="itemlisting"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="button" name="submit_transaction" id="submit_transaction" value="1" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal" id="item_listing_modal">
        <div class="modal-dialog" style="width: 60%;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Transaction</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <table id="product_list" class="table table-condensed table=bordered text-center">
                        <thead>
                            <tr class="">
                                <td style="width: 5%;"> &nbsp; </td>
                                <td> Item Name </td>
                                <td> Description </td>
                                <td> Price </td>
                                <td> Type </td>
                            </tr>
                        </thead>
                        <tbody id="product_list_body">

                        </tbody>
                    </table>

                    <div class="col-md-12 mb-3">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.datatables.net/2.0.7/js/dataTables.min.js'></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script type='text/javascript' src='js/moment.js'></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/transaction.js'></script>
    <script type='text/javascript' src='js/clock.js'></script>
    <script type='text/javascript' src='js/profilepic.js'></script>



</html>