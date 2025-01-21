<?php
require_once "config/database.php";

session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "admin") {
    header("location: index.php");
    die();
}
$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM user WHERE id='$user_id' ";
$result = mysqli_query($conn, $query);
$profilepic = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/employee.css?v=<?php echo time(); ?>">
</head>


<body>
    
    <div class="banner">
        <div class="navbar">
        <a href="employee.php" class="logo">Tattoo<span>Gym</span></a>

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
                <img src="images/Employees/<?php echo $profilepic['image']; ?>" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                    <img style="height: 50px;" src="images/Employees/<?php echo $profilepic['image']; ?>" alt="">
                    <h2><?php echo $profilepic['uname'] ?></h2>
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
    $query = "select * from tblsupplier ";
    $result = mysqli_query($conn, $query)

    ?>


    <style>

    </style>


    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: black;">Supplier </div>
            <div class="panel-body">
                <button type="button" id="add_supplier"><i class="fas fa-plus"></i> Add Supplier</button>
                <table id="myTable" class="table table-condensed text-center">
                    <thead>
                        <tr class="">
                            <td> Supplier ID </td>
                            <td> Supplier </td>
                            <td> Contact Person </td>
                            <td> Address </td>
                            <td> Contact </td>
                            <td> Status </td>
                            <td style="width: 5%;"> Edit </td>
                            <td style="width: 5%;"> Delete </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr style="<?= $row['status'] != 1 ? 'text-decoration: line-through; background-color: pink; color: black;' : '' ?>">
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['supplier'] ?></td>
                                <td><?php echo $row['person'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['contactno'] ?></td>
                                <td><?php echo $row['status'] == 1 ? "active" : "inactive" ?></td>
                                <!-- <td><a href="register-edit.php?id=" class="btn-btn-primary">Edit</a></td> -->
                                <td><button type="button" supplier_id="<?= $row['id']; ?>" style="background-color: #00b6ff;" class="edit_supplier">Edit</button></td>
                                <?php if ($row['status'] == 1) : ?>
                                    <td><button type="button" supplier_id="<?= $row['id']; ?>" style="background-color: #d9534f;" class="deactivate_supplier">Deactivate</button></td>
                                <?php else : ?>
                                    <td><button type="button" supplier_id="<?= $row['id']; ?>" style="background-color: #3cb371;" class="activate_supplier">Activate</button></td>
                                <?php endif; ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="add_supplier_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Suppliers Info.</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="config/supplier.php" method="POST">
                        <input type="hidden" name="supplier_id" id="supplier_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Supplier</label>
                                <input type="text" name="name" id="supplier" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Contact Person</label>
                                <input type="text" name="name" id="person" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" name="name" id="address" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Contact</label>
                                <input type="text" name="name" id="contactno" class="form-control inputs">
                            </div>


                            <div class="col-md-12 mb-3">
                                <button type="button" name="submit_supplier" id="submit_supplier" value="1" class="btn btn-primary">Submit</button>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.datatables.net/2.0.7/js/dataTables.min.js'></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script type='text/javascript' src='js/moment.js'></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/supplier.js'></script>
    <script type='text/javascript' src='js/clock.js'></script>
    <script type='text/javascript' src='js/profilepic.js'></script>



</html>