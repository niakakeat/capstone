<?php
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
    <title>Body Plans</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/dietary.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <a href="profile.php" class="logo">Tattoo<span>Gym</span></a>
        <div class='bx bx-menu' id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="profile.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <div class="top-btn">
            <a href="logout.php" class="nav-btn">Log out</a>
        </div>
    </header>

    <!-- <div class="menu-btn">
        <i class="fas fa-bars"></i>
    </div>

    <div class="side-bar">
        <div class="head">
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>

        </div>
        <div class="menu">
            <div class="item"><a class="sub-btn"><i class="fas fa-calendar"></i>Plans
                    <i class="fas fa-angle-right dropdown"></i>
                </a>
                <div class="sub-menu">
                    <a href="" class="sub-item">Workout Routines</a>
                    <a href="dietary.php" class="sub-item">Dietary Plans</a>
                </div>
            </div>
            <div class="item"><a href="tutorial.php"><i class="fas fa-book-open"></i>Tutorial</a></div>
        </div>
    </div> -->

    <div class="services" id="services">
        <h2 class="heading" data-aos="zoom-in-down">Workout and Dietary <Span>Plans</Span></h2>
        <div class="services-content" data-aos="zoom-in-up">
            <!-- <div class="row">
                <a href="#"><img src="images/bulking.jpg" link></a>
                <h4>Bulking</h4>
            </div>
            <div class="row">
                <a href="#"><img src="images/cutting.jpg" link></a>
                <h4>Cutting</h4>
            </div>
            <div class="row">
                <a href="#"><img src="images/cutting.jpg" link></a>
                <h4>Cutting</h4>
            </div> -->
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
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.datatables.net/2.0.7/js/dataTables.min.js'></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script type='text/javascript' src='js/moment.js'></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/default.js'></script>
    <script type='text/javascript' src='js/profile.js'></script>



</body>

</html>