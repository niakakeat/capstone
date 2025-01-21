<?php
session_start();
if (!empty($_SESSION['usertype'])) {
    header("location: index.php");
    die();
}
include('head.php');


?>
<style>

</style>

<body>
    
    <div class="container">
        <?php
        $err_msg = '';
        if (!empty($_POST)) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM user WHERE email = '$email' AND upass = '$password'";
            $result = mysqli_query($conn, $sql);
            // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $row = mysqli_fetch_array($result);

            if ($row) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['uname'] = $row["uname"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['usertype'] = $row["usertype"];
            
                if ($row["usertype"] == "user") {
                    header("location: profile.php");
                    exit;
                } elseif ($row["usertype"] == "admin") {
                    header("location: dashboard.php");
                    exit;
                } elseif ($row["usertype"] == "staff") {
                    header("location: employee.php");
                    exit;
                }
            } else {
                $err_msg .= "<div class='alert alert-danger'>Email or Password does not exist</div>";
            }
        }
        ?>

        <form action="index.php" method="post">

            <div class="form_login">
                <h1 id="form_h1">LOGIN</h1>



                <?php
                echo !empty($err_msg) ? $err_msg : '';
                ?>
                <label for="email"><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>

 
                <!-- <div class="button"> -->
                <div>
                    <p><a href="forgotpassword.php">Forgot Password?</a></p>
                </div>

                <button type="submit" id="login_button">Login</button>
                <div>
                    <p>Not yet a member? <a href="registration.php">Sign up now</a></p>
                </div>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>

                <!-- </div> -->
            </div>

        </form>

    </div>
</body>

</html>