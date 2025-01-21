<?php
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "admin") {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>User's List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
</head>



<?php require_once "config/database.php";
$query = "select * from user ";
$result = mysqli_query($conn, $query)

?>
<?php
include('header.php');
?>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="home.php"><img src="images/logo2.jpg" class="logo"></a>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="scheduling.php" style="--clr:#">Schedule</a></li>
                <li>
                    <div class="dropdown" style="--clr:#">
                        <a href="" class="dropbtn">Maintenance</a>
                        <div class="dropdown-content">
                            <a href="customer.php" style="--clr:#">Customer</a>
                            <a href="userlist.php" style="--clr:#">User</a>
                            <a href="instructor.php" style="--clr:#">Instructor</a>
                            <a href="supplier.php" style="--clr:#">Supplier</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="" class="dropbtn">Product Maintenance</a>
                        <div class="dropdown-content">
                            <a href="item.php">Product</a>
                            <a href="product_category.php">Product Category</a>
                        </div>
                    </div>
                </li>
                <li><a href="inventory.php" style="--clr:#">Inventory</a></li>
                <!-- <li><a href="transaction.php" style="--clr:#">Transaction</a></li> -->
                <li><a href="logout.php" style="--clr:#">Log Out</a></li>
            </ul>
            <div class="clock">
                <span id="hours">00</span>
                <span>:</span>
                <span id="min">00</span>
                <span>:</span>
                <span id="sec">00</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-primary" style="width: 100%;">
            <div class="panel-heading" style="background-color: black;">User List</div>
            <div class="panel-body">

                <table id="myTable" class="table table-condensed text-center">
                    <thead>
                        <tr class="">
                            <td> User ID </td>
                            <td> Name </td>
                            <td> Email </td>
                            <td> Status </td>
                            <td style="width: 5%;"> Edit </td>
                            <td style="width: 5%;"> Delete </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr style="<?= $row['isactive'] != 1 ? 'text-decoration: line-through; background-color: pink; color: black;' : '' ?>">
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['uname'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['isactive'] == 1 ? "Active" : "Inactive" ?></td>
                                <!-- <td><a href="register-edit.php?id=" class="btn-btn-primary">Edit</a></td> -->
                                <td><button type="button" user_id="<?= $row['id']; ?>" style="background-color: #00b6ff;" class="edit_user">Edit</button></td>
                                <?php if ($row['isactive'] == 1) : ?>
                                    <td><button type="button" user_id="<?= $row['id']; ?>" style="background-color: #d9534f;" class="delete_user">Deactivate</button></td>
                                <?php else : ?>
                                    <td><button type="button" user_id="<?= $row['id']; ?>" style="background-color: #3cb371;" class="activate_user">Activate</button></td>
                                <?php endif; ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="user_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="config/code.php" method="POST">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="uname" id="uname" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">User Password</label>
                                <input type="text" name="upass" id="upass" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control inputs">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="button" name="update_user" id="sample" value="1" class="btn btn-primary">Update User</button>
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



    <!-- Custom Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src='https://cdn.datatables.net/2.0.7/js/dataTables.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script src="js/scripts.js"></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/users.js'></script>
    <script type='text/javascript' src='js/clock.js'></script>

</body>

</html>