<?php
require_once "config/database.php";
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "user") {
    header("location: index.php");
    die();
}
?>
<?php
if(!empty($_POST['update_product_quantity'])){
    $update_value=$_POST['update_quantity'];

    $update_id=$_POST['update_quantity_id'];

    $update_quantity_query=mysqli_query($conn, "UPDATE `tblcart` SET quantity=$update_value where id=$update_id ");
    if($update_quantity_query){
        header('location:cart.php');
    }
}

if(!empty($_GET['remove'])){
    $remove_id=$_GET['remove'];
    // echo $remove_id;
    mysqli_query($conn, "Delete from `tblcart` where id=$remove_id");
    header('location:cart.php');

}

if(isset($_GET['delete_all'])){
    mysqli_query($conn,"Delete from `tblcart`");
    header('location:cart.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
</head>

<style>
    header .icon-cart span {
        color: white;
        display: flex;
        width: 20px;
        height: 20px;
        background-color: red;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        right: 150px;
    }
</style>

<body>
    <header>
        <a href="profile.php" class="logo">Tattoo<span>Gym</span></a>
        <div class='bx bx-menu' id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="profile.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="order.php">My Orders</a></li>
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



    <div class="container">
        <section class="cart" id="cart">
            <!-- <h2 class="heading" data-aos="zoom-in-down">Shopping <span>Cart</span></h2> -->
            <h2 class="heading">Shopping <span>Cart</span></h2>
            <div class="panel-body">
                <table id="myTable" class="table table-condensed text-center">
                    <?php
                    $select_tblcart = mysqli_query($conn, "Select * from `tblcart`");
                    $num=1;
                    $grand_total=0;
                    if (mysqli_num_rows($select_tblcart) > 0) {
                        echo "<thead>
                        <tr class>
                             <th><p style='color:white; font-size: 15px'>S1 no</p></th>
                            <th><p style='color:white; font-size: 15px'>Product Name</p></th>
                            <th><p style='color:white; font-size: 15px'>Product Image</p></th>
                            <th><p style='color:white; font-size: 15px'>Product Price</p></th>
                            <th><p style='color:white; font-size: 15px'>Product Quantity</p></th>
                            <th><p style='color:white; font-size: 15px'>Total Price</p></th>
                            <th><p style='color:white; font-size: 15px'>Action</p></th>
                        </tr>
                    </thead>";
                        while ($fetch_cart = mysqli_fetch_assoc($select_tblcart)) {
                    ?>
                            <tbody>
                                <tr class="table">
                                    <td style="color: white; font-size: 15px"><?php echo $num?></td>
                                    <td style="color: white; font-size: 15px"><?php echo $fetch_cart ['name'] ?></td>
                                    <td>
                                    <img src="images/<?php echo $fetch_cart['image']; ?>" height="50" width="50">
                                    </td>
                                    <td style="color: white; font-size: 15px"><p>PHP <?php echo $fetch_cart['price'] ?></p></td>
                                    <td style="font-size: 15px">
                                        <form action="" method="POST">
                                            <input type="hidden" value="<?php echo $fetch_cart['id'] ?>" name="update_quantity_id">
                                        <div class="quantity_box">
                                            <input type="number" min="1" value="<?php echo $fetch_cart['quantity'] ?>" name="update_quantity" style="background-color: bisque; width: 60px">
                                            <input type="submit" class="update_quantity" value="Update" name="update_product_quantity" style="background-color: black; color:white; width: 50px">
                                        </div>
                                        </form>
                                    </td>
                                    <td style="color: white; font-size: 15px"><p>PHP <?php echo $subtotal= number_format ($fetch_cart['price'] * $fetch_cart['quantity'])?></p></td>
                                    <td style="font-size: 15px">
                                        <a href="cart.php?remove=<?php echo $fetch_cart['id'] ?>" 
                                        onclick="return confirm('Are you sure you want to delete this item?')" style="color: red;">
                                            <i class="fas fa-trash" style="color: red;"></i>Remove
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                    $grand_total+=($fetch_cart['price'] * $fetch_cart['quantity']);
                    $num++;

                        }
                    } else {
                        echo "<p style='color:white; text-align:center;'>" . "No Product" . "</p>";
                    }


                    ?>
                    </table>

                    <?php
                    if($grand_total>0){
                        echo "<div class='table_bottom' style='height: 90px;'>
                        <a href='shop.php' class='bottom_btn' style='color: white;'>Continue Shopping</a>
                        <h3 class='bottom_btn' style='align-items: center; color:black; margin-bottom: 10px; margin-right: 60px;'>Grand Total: PHP<span style='color: black;'> $grand_total</span></h3>
                        <a href='success.php' class='bottom_btn' style='color:white; margin-left:55px'>Cash on Delivery</a>
                    </div>"
                    
                    ?>

                <a href="cart.php?delete_all" class="delete_all_btn" style="color: white;">
                    <i style="color: red;" class="fas fa-trash"> Delete All</i>
                </a>
                <?php
                }else{
                    echo "";
                }
                ?>
            </div>
        </section>
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
    <script type='text/javascript' src='js/profilepic.js'></script>




</body>

</html>