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
    <link rel="stylesheet" href="css/staff.css?v=<?php echo time(); ?>">
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

    

    <div class="services" id="services">
        <h2 class="heading" data-aos="zoom-in-down">Expert <Span>Coach</Span></h2>
        <h1 class="headings" data-aos="zoom-in-down">Choose your <Span>Coach</Span></h1>
        <div class="services-content" data-aos="zoom-in-up">
            <div class="row">
                <a href="#"><img src="images/profile.jpg" link></a>
                <h4>Rafael Las Marias</h4>
                <h3>Health Coach</h3>

            </div>
            <div class="row">
                <a href="#"><img src="images/stans.jpg" link></a>
                <h4>Stanley Capuno</h4>
                <h3>Health Coach</h3>

            </div>
            <div class="row">
                <a href="#"><img src="images/bhien.jpg" link></a>
                <h4>Bhiena Fortez</h4>
                <h3>Health Coach</h3>

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