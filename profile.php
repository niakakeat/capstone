<?php
require_once "config/database.php";
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "user") {
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
    <title>Tattoo Gym</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
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
                <li><a href="shop.php">My Orders</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <?php
            $select_tblcart = mysqli_query($conn, "SELECT * FROM `tblcart`");
            if (!$select_tblcart) {
                die('Query failed: ' . mysqli_error($conn));
            }
            $row_count = mysqli_num_rows($select_tblcart);
            
            ?>

            <div class="icon-cart" id="icon-cart">
                <a href="cart.php"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg><span><sup><?php echo $row_count ?></sup></span></a>
            </div>
            <img src="images/Employees/<?php echo $profilepic['image']; ?>" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="images/Employees/<?php echo $profilepic['image']; ?>" alt="">
                        <h2><?php echo $profilepic['uname'] ?></h2>
                    </div>
                    <hr>
                    <a href="editprofile.php" class="sub-menu-link">
                        <img src="images/edit.png">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>
                    
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

    <main>
        <div class="content">
            <div class="logo-box">
                <img src="images/homebg.jpg" alt="">
            </div>
        </div>

        <div class="grid-container">
            <div class="grid-item">
                <a href="timetable.php">Time Table</a>
            </div>
            <div class="grid-item">
                <a href="staff.php">INSTRUCTORS AND COACHES.</a>
            </div>
            <div class="grid-item">
                <a href="dietary.php">WORK OUT PLANS AND DIET</a>
            </div>
            <div class="grid-item">
                <a href="shop.php">ONLINE SHOP</a>
            </div>

        </div>
    </main>








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




</body>



</html>