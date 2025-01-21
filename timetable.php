<?php
require_once "config/database.php";
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "user") {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Our Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/customer.css?v=<?php echo time(); ?>">
</head>


<body class="">
    <form method="POST" action="config/shop_config.php">

        <header>

            <a href="profile.php" class="logo">Tattoo<span>Gym</span></a>
            <div class='bx bx-menu' id="menu-icon"></div>
            <ul class="navbar">
                <li><a href="profile.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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
                        <img src="images/edit.png">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    <!-- <a href="#" class="sub-menu-link">
                    <img src="images/settings.png">
                    <p>Settings</p>
                    <span>></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="images/help.png">
                    <p>Help and Support</p>
                    <span>></span>
                </a> -->
                    <a href="default.php" class="sub-menu-link">
                        <img src="images/logout.webp">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>

        </header>
    </form>

    <?php
    $query = "select * from tblinventory";
    $result = mysqli_query($conn, $query)

    ?>

    <style>
        .container{
margin-top: 100px;
        }
        #calendar table {
            background-color: white;
            /* Change to your desired color */
            border: 1px solid #ccc;
            /* Optional: Add a border */
        }

        #calendar th {
            background-color: black;
            /* Change header color */
            color: white;
            /* Change header text color */
        }

        #calendar td {
            color: black;
            /* Change table data text color */
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
                    <form action="config/timetable_config.php" method="POST">
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









    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 300,
            duration: 1400,
        });
    </script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.datatables.net/2.0.7/js/dataTables.min.js'></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script type='text/javascript' src='js/moment.js'></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/default.js'></script>
    <script type='text/javascript' src='js/profile.js'></script>
    <script type='text/javascript' src='js/profilepic.js'></script>
    <script type='text/javascript' src='js/timetable.js'></script>




</body>



</html>