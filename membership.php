 <?php require_once "config/database.php";
    $query = "select * from tblmembership ";
    $result = mysqli_query($conn, $query)
    ?>
    <?php
    include('header.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Membership</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/default.css?v=<?php echo time(); ?>">

</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    background: var(--snd-bg-color);
    margin-top: 100px;

}

.membership {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    top: 50px;
border-radius: 25px;
}

h1, h2 {
    text-align: center;
}

form {
    margin: 20px 0;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input, select {
    margin: 5px 0 20px;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
}

.membership button {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    display: block;
    width: 100%;
    box-sizing: border-box;
}

button:hover {
    background-color: #218838;
}

.hidden {
    display: none;
}

</style>

<body>
    <header>
    <a href="default.php" class="logo">Tattoo<span>Gym</span></a>

    </header>
    <?php
        if (!empty($_POST["submit"])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $bdate = $_POST["bdate"];
            $contactno = $_POST["contactno"];
            $membership_type = $_POST['membership_type'];


            $errors = array();

            if (empty($fname) or empty($lname) or empty($email) or empty($bdate) or empty($contactno)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            // if (strlen($password) < 8) {
            //     array_push($errors, "Password must be at least 8 characters long");
            // }
            // if ($password != $passwordRepeat) {
            //     array_push($errors, "Password does not match");
            // }

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
                $sql = "INSERT INTO tblmembership (fname, lname, email, bdate, contactno, membership_type) VALUES ('$fname', '$lname', '$email', '$bdate', '$contactno', '$membership_type')";

                if (mysqli_query($conn, $sql)) {

                //     echo "<div class=' alert aler-success'>You are registered successfully.</div>";
                // } else {
                    header("location: payment.php");
                }
            }
        }
        ?>

    <div class="membership">
        <h1>Sign Up for Gym Membership</h1>
        <form action="membership.php" class="membership" method="post">
            <div class="form-group">
            <label for="fname"><b>First Name</b></label>
                <input type="text" class="form-control" name="fname" value="<?= !empty($fname) ? $fname : '' ?>" placeholder="First Name:">
            </div>
            <div class="form-group">
            <label for="lname"><b>Last Name</b></label>
                <input type="text" class="form-control" name="lname" value="<?= !empty($lname) ? $lname : '' ?>" placeholder="Last Name:">
            </div>
            <div class="form-group">
            <label for="email"><b>Email</b></label>
                <input type="text" class="form-control" name="email" value="<?= !empty($email) ? $email : '' ?>" placeholder="Email:">
            </div>
            <div class="form-group">
            <label for="bdate"><b>Birth Date</b></label>
                <input type="date" class="form-control" name="bdate" placeholder="Birth Date:">
            </div>
            <div class="form-group">
            <label for="contactno"><b>Contact Number</b></label>
                <input type="text" class="form-control" name="contactno" placeholder="Contact no:">
            </div>
            <label for="membership">Membership Type:</label>
            <select name="membership_type" id="membership" required>
                <option value="basic">Basic</option>
                <option value="Pro">Pro</option>
                <option value="Platinum">Platinum</option>
            </select>
            <br>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Continue" name="submit">
            </div>
        </form>
        
    </div>

    

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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script src="js/scripts.js"></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/membership.js'></script>

    <script>
        document.getElementById('membershipForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const plan = document.getElementById('plan').value;
    
    const confirmationMessage = `Thank you, ${name}! You have signed up for the ${plan} membership plan.`;
    
    document.getElementById('confirmationMessage').innerText = confirmationMessage;
    
    document.getElementById('membershipForm').classList.add('hidden');
    document.getElementById('confirmation').classList.remove('hidden');
});

    </script>
</body>

</html>