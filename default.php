<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>TattooGym</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/default.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <a href="default.php" class="logo">Tattoo<span>Gym</span></a>
        <div class='bx bx-menu' id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#services">Classes</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#plans">Pricing</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>

        <div class="top-btn">
            <a href="logout.php" class="nav-btn">Log in</a>
        </div>
    </header>

    <section class="hero-video" data-aos="zoom-in-down">
        <video autoplay loop muted>
            <source src="video/vid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section>

    <section class="home" id="home">
        <div class="home-content" data-aos="zoom-in">
            <h3>Build Your</h3>
            <h1>Dream Physique</h1>
            <h3><span class="multiple-text"></span></h3>

            <p>"Your future self will thank you for the hardwork you put in today."</p>

            <a href="membership.php" class="btn">Join Us</a>
        </div>

        <div class="home-img" data-aos="zoom-in">
            <img src="images/image1.jpg" alt="tattoogym">
        </div>
    </section>

    <section class="services" id="services">
        <h2 class="heading" data-aos="zoom-in-down">Our <Span>Classes</Span></h2>
        <div class="services-content" data-aos="zoom-in-up">
            <div class="row">
                <a href="classes.php"><img src="images/classes.jpg" link></a>
                <h4>Classes</h4>
            </div>

            <div class="row">
                <a href="classes.php"><img src="images/yoga.jpg" link></a>
                <h4>Yoga</h4>
            </div>

            <div class="row">
                <a href="classes.php"><img src="images/cycling.jpg" link></a>
                <h4>Cycling</h4>
            </div>

            <div class="row">
                <a href="classes.php"><img src="images/strength.jpg" link></a>
                <h4>Strength</h4>
            </div> 
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/1.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">Why Choose Us?</h2>
            <p>At Tattoo Gym, we're passionate about helping you achieve your fitness goals in a supportive and motivating environment. Located conveniently in Lower Bicutan, Taguig City, we offer a comprehensive range of equipment, classes, and services to cater to all fitness levels and interests.
            <p>Membership at Tattoo Gym is more than just access to a facility; it's an investment in one's health and wellness journey. Members enjoy full use of the gym's equipment and can participate in a wide range of group fitness classes.</p>
            <p>One of the defining features of Tatto Gym is its strong sense of community. The gym prides itself on creating a welcoming and inclusive environment where members can feel motivated and supported. This sense of camaraderie is evident in the group classes, personal training sessions, and even casual interactions among members. The staff at Tattoo Gym are dedicated to ensuring that every member feels valued and encouraged, regardless of their fitness level or experience.</p>
            <p style="text-align: center;">© 2024 Tattoo Gym. All right reserved.</p>
        </div>
    </section>

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
                    Join Now
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
                    Join Now
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
                    <li>FREE T-SHIRT (MEMBERSHIP TEE), SHAKER BOTTLE AND 2 PAIRS OF NON-SLIP LIFTING GLOVES.
                    </li>


                </ul>
                <a href="Membership.php">
                    Join Now
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h2 class="heading" data-aos="zoom-in-down"><span>Contact</span> Us</h2>
        <div class="contact-content">

            <div class="contact-info"data-aos="zoom-in-up">
                <h3>Contact Information</h3>
                <ul>
                   

                    <p><i class="fas fa-phone"></i>+63 912 345 6789</p>
                    <p><i class="fas fa-envelope"></i>stanley.capuno@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>123 st. Manila City, Philippines</p>
                </ul>

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

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        offset:300,
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
</body>

</html>