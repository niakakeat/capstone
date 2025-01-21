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
    <title>Client's Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
</head>



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
    <?php require_once "config/database.php";
    $query = "select * from tblevent ";
    $result = mysqli_query($conn, $query)

    ?>
    <?php
    include('header.php');
    ?>
<style>
        #calendar table {
            background-color: white; /* Change to your desired color */
            border: 1px solid #ccc;    /* Optional: Add a border */
        }
        #calendar th {
            background-color: black; /* Change header color */
            color: white;              /* Change header text color */
        }
        #calendar td {
            color: black;               /* Change table data text color */
        }
        
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

</html>