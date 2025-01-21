<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>TattooGym</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/collection.css?v=<?php echo time(); ?>">
</head>

<body class="showCart">

    <header>
        
            <a href="profile.php" class="logo">Tattoo<span>Gym</span></a>
            <div class='bx bx-menu' id="menu-icon"></div>
            <ul class="navbar">
                <li><a href="profile.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <div class="icon-cart" id="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                </svg>
                <span>0</span>
                <a href="index.php" class="nav-btn">Log out</a>
            </div>
            <!-- <div class="container">
        </div> -->
    </header>




    <?php require_once "config/database.php";
    $query = "select * from tblinventory";
    $result = mysqli_query($conn, $query)

    ?>

    <main>
        <section class="cart" id="cart">
            <h2 class="heading" data-aos="zoom-in-down">Tatto<span>Gym</span> Shopping</h2>
            <div class="services-content" data-aos="zoom-in-up">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                    <?php if ($row['status'] == 1) : ?>
                        <div class="row">
                            <!-- <img src="images/1.jpg" alt="Product 1"> -->
                            <a href="">
                                <img src="images/<?php echo $row['image']; ?>" height="50" width="50">
                            </a>
                            <a href="">
                                <h2><?php echo $row['name'] ?></h2>
                            </a>
                            <a href="">
                                <p>PHP <?php echo $row['price'] ?></p>
                            </a>
                            <button class="addCart">
                                Add to Cart
                            </button>


                            <td><?php echo $row['status'] == 1 ? "active" : "inactive" ?></td>

                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
            </div>
            </div>
        </section>
    </main>



    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
            <div class="item">
                <div class="image">
                    <img src="images/1.jpg" alt="">
                </div>
                <div class="name">
                    Name
                </div>
                <div class="totalPrice">
                    200
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                            <span>1</span>
                            <span class="plus">></span>
                </div>
            </div>
        </div>


        <div class="btn">
            <button class="close" id="close">CLOSE</button>
            <button class="checkOut">Check Out</button>
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
    <script type='text/javascript' src='js/shop.js'></script>





</body>

</html>