<?php require_once "config/database.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="css/registration.css?v=<?php echo time(); ?>">
</head>
<style>
    
</style>

<body>
    <div class="container">
        <?php
        if (!empty($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $errors = array();

            if (empty($fullname) or empty($email) or empty($password) or empty($passwordRepeat)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password != $passwordRepeat) {
                array_push($errors, "Password does not match");
            }

            if (empty($errors)) {
                $sql = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "Email already exists!");
                }
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO user (uname, email, upass) VALUES ( '$fullname', '$email', '$password')";

                if (mysqli_query($conn, $sql)) {

                    echo "<div class=' alert aler-success'>You are registered successfully.</div>";
                } else {
                    echo "Something went wrong";
                }
            }
            // else {
            //     $sql = "INSERT INTO user (uname, upass) VALUES ('$fullname', '$password')";

            //     $result = mysqli_query($conn, $sql);
            // }
        }
        ?>
        <form action="registration.php" class="form_registration" method="post">
            <h2>REGISTRATION</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" value="<?= !empty($fullname) ? $fullname : '' ?>" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" value="<?= !empty($email) ? $email : '' ?>" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Sign up" name="submit">
                <div>
                    <p>Already a member? <a href="index.php">Login Here</a></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>