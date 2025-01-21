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
    <link rel="stylesheet" href="css/classes.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <a href="default.php" class="logo">Tattoo<span>Gym</span></a>
        <div class='bx bx-menu' id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="#class">Class</a></li>
            <li><a href="#yoga">Yoga</a></li>
            <li><a href="#cycling">Cycling</a></li>
            <li><a href="#strength">Strength</a></li>
            <!-- <li><a href="#bulking">Bulking</a></li>
            <li><a href="#cutting">Cutting</a></li> -->

        </ul>

        <div class="top-btn">
            <a href="index.php" class="nav-btn">Log in</a>
        </div>
    </header>


    <section class="class" id="class">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/classes.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">Tattoo Gym Group Fitness Class</h2>
            <h3 class="head">Why Group Fitness?</h3>
            <p>Group fitness classes offer a range of benefits that can enhance your workout experience and help you achieve your fitness goals more effectively. Overall, group fitness classes provide a supportive, engaging, and structured environment that can enhance your motivation, fitness results, and overall enjoyment of your workout routine.</p>

            <a href="membership.php" class="btn">Join Us</a>

        </div>
    </section>

    <section class="yoga" id="yoga">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/yoga.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">YOGA CLASS</h2>
            <h3 class="head">Yoga is not about touching your toes. It is about unlocking your idea of what is possible.</h3>
            <p>A yoga class involves guided physical exercises, breathing techniques, and meditation practices aimed at enhancing flexibility, strength, and mental well-being. Instructors lead participants through various poses and sequences, providing adjustments and modifications to suit different skill levels.</p>
            
            <a href="membership.php" class="btn">Join Us</a>

        </div>
    </section>

    <section class="cycling" id="cycling">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/cycling.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">CYCLING CLASS</h2>
            <h3 class="head">Cycling classes are a great way to get into shape, improve your fitness, and enjoy the camaraderie of a group workout.</h3>
            <p>Cycling classes are group exercise sessions centered around indoor cycling, typically conducted on stationary bikes. In these classes, participants follow an instructor who guides them through various cycling workouts, often including different speeds, resistances, and intensities to simulate a range of outdoor cycling experiences. The goal is to provide a cardiovascular workout that improves endurance, strength, and overall fitness. Classes often feature motivating music and can vary in style, from high-energy, rhythm-based rides to more focused, endurance-building sessions.</p>
            <p>Cycling gym classes are a fun and effective way to improve your cardiovascular fitness, build lower body strength, and stay motivated with the support of a group setting. Whether you’re new to cycling or an experienced rider, these classes offer a dynamic and engaging workout experience.</p>
            
            <a href="membership.php" class="btn">Join Us</a>

        </div>
    </section>

    <section class="strength" id="strength">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/strength.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">STRENGTH TRAINING CLASS</h2>
            <h3 class="head">Want to improve your overall health?</h3>
            <p>When you are looking to build strength in the gym, a well-structured strength training class can be highly effective. These classes typically focus on exercises and routines designed to increase muscle mass, enhance endurance, and improve overall strength.</p>

            <a href="membership.php" class="btn">Join Us</a>

        </div>
    </section>

    <!-- <section class="bulking" id="bulking">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/1.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">BULK TRAINING</h2>
            <h3 class="head">Bulking Program</h3>
            <p>A bulking class generally refers to a fitness or bodybuilding class designed to help participants gain muscle mass and increase overall body weight through structured training and nutrition strategies.</p>
            <p>These classes are less about endurance and more focused on incorporating elements that help with muscle growth and strength.</p>

            <a href="membership.php" class="btn">Join Us</a>

        </div>
        </section>


        <section class="cutting" id="cutting">
        <div class="about-img" data-aos="zoom-in-down">
            <img src="images/1.jpg" alt="">
        </div>
        <div class="about-content" data-aos="zoom-in-up">
            <h2 class="heading">CUTTING PROGRAM</h2>
            <p>A “cutting class” typically refers to a structured program or class designed to help individuals lose fat while maintaining muscle mass. Cutting is often a phase in a fitness regimen following a bulking phase, aimed at reducing body fat to achieve a leaner physique. Here’s what you might expect from a cutting class and how you can approach it effectively:</p>

            <a href="membership.php" class="btn">Join Us</a>

        </div>
    </section> -->





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
</body>

</html>