<?php
require_once "config/database.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Choose Your Plan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/default.css?v=<?php echo time(); ?>">

</head>
<body>
    <header>
        <a href="default.php" class="logo">Tattoo<span>Gym</span></a>
        <div class='bx bx-menu' id="menu-icon"></div>
        <!-- <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#services">Classes</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#plans">Pricing</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul> -->
    </header>

    <section class="plans" id="plans">
        <h2 class="heading" data-aos="zoom-in-down">Our <span>Plans</span></h2>
        <div class="plans-content" data-aos="zoom-in-up">

            <div class="box">
                <h3>Basic</h3>
                <h2><span>PHP850/Month</span></h2>
                <ul>
                    <li>UNLI VISIT TO AND ACCESS 
                    WEBSITE + OPEN GYM FOR A MONTH.</li>
                    <li>FREE USE OF WATER DISPENSER </li>
                </ul>
                <a href="Membership.php">
                Proceed to Payment
                <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

            <div class="box">
                <h3>Pro</h3>
                <h2><span>PHP1,500/
                    3Months</span></h2>
                <ul>
                    <li>UNLI VISIT TO AND ACCESS 
                    WEBSITE + OPEN GYM FOR A MONTH.</li>
                    <li>FREE USE OF WATER DISPENSER + 1 SCOOP OF WHEY PROTEIN EVERYDAY </li>
                    <li>2 WEEKS PERSONAL COACH (OPEN GYM) + 1 WEEK FREE ONLINE CLASSES COME WITH CONSULTATION & DIETARY PLANS.</li>
                    <li>FREE T-SHIRT (MEMBERSHIP TEE)</li>
                </ul>
                <a href="Membership.php">
                    Proceed to Payment
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

            <div class="box">
                <h3>Platinum</h3>
                <h2><span>PHP8,000/1Year</span></h2>
                <ul>
                    <li>UNLI VISIT TO AND ACCESS 
                    WEBSITE + OPEN GYM FOR A YEAR.</li>
                    <li>FREE USE OF WATER DISPENSER + 1 SCOOP OF WHEY PROTEIN & CREATINE EVERYDAY.</li>
                    <li>FREE ENERGY DRINKS.</li>
                    <li>8 WEEKS PERSONAL COACH (OPEN GYM) + 5 WEEK FREE ONLINE CLASSES COMES WITH CONSULTATION & DIETARY PLANS.</li>
                    <li>FREE MONTHLY WEIGH IN FOR PROGRESS CHECKING.</li>
                    <li>FREE BRING A FRIEND (1 PERSON ONLY)</li>
                    <li>FREE T-SHIRT (MEMBERSHIP TEE), SHAKER BOTTLE AND 2 PAIRS OF NON-SLIP LIFTING GLOVES.</li>


                </ul>
                <a href="Membership.php">
                Proceed to Payment
                <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>
        </div>
    </section>



    <footer class="footer">
                    <div class="social">
                        <a href="https://www.facebook.com/teamtattoogym?mibextid=ZbWKwL"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                </div>
                <p class="copyright">
                    &copy; 2024 Tattoo Gym. All Rights Reserved.
                </p>
    </footer>



</body>

</html>