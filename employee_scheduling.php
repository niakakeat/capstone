<?php
require_once "config/database.php";

session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "staff") {
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
    <title>Client's Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
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
    $query = "select * from tblevent ";
    $result = mysqli_query($conn, $query)

    ?>


    <style>

    </style>


    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: black;">Calendar</div>
            <div class="panel-body">

                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <div class="modal" id="event_submit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Scheduling</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="config/scheduling.php" method="POST">
                        <input type="hidden" name="event_id" id="event_id">
                        <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="">Event Name</label>
                                <input type="text" name="event_name" id="event_name" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Event Start Date</label>
                                <input type="date" name="event_start_date" id="event_start_date" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Event End Date</label>
                                <input type="date" name="event_end_date" id="event_end_date" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Event start Time</label>
                                <input type="time" name="event_start_time" id="event_start_time" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Event End Time</label>
                                <input type="time" name="event_end_time" id="event_end_time" class="form-control inputs">
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="">Instructor</label>
                                <select id="instructor" class="form-control inputs">
                                    <option value=""></option>
                                </select>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Client</label>
                                <select id="user_id" class="form-control inputs">
                                    <option value=""></option>
                                </select>

                            </div>





                            <div class="col-md-12 mb-3">
                                <button type="button" name="submit_event" id="submit_event" value="1" class="btn btn-primary">Submit</button>
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
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script type='text/javascript' src='js/moment.js'></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/scheduling.js'></script>
    <script type='text/javascript' src='js/clock.js'></script>
    <script type='text/javascript' src='js/profilepic.js'></script>



</html>