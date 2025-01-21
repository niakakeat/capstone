<?php require_once "config/database.php";
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="">
</head>
<style>

</style>

<body>
  <div class="container">
    <?php
    if (!empty($_POST["submit"])) {
      $fname = $_POST["fname"];
      $mname = $_POST["mname"];
      $lname = $_POST["lname"];
      $email = $_POST["email"];
      $pass = $_POST["pass"];
      $passwordRepeat = $_POST["repeat_password"];
      $contact = $_POST["contact"];
      $course = $_POST["course"];


      $errors = array();

      if (empty($fname) or empty($mname) or empty($lname) or empty($email) or empty($pass) or empty($passwordRepeat) or empty($contact) or empty($course)) {
        array_push($errors, "All fields are required");
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
      }
      if (strlen($pass) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
      }
      if ($pass != $passwordRepeat) {
        array_push($errors, "Password does not match");
      }

      if (empty($errors)) {
        $sql = "SELECT * FROM sale WHERE email = '$email'";
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
        $sql = "INSERT INTO sale (fname, mname, lname, email, pass, contact, course) VALUES ( '$fname', '$mname', '$lname', '$email', '$pass', '$contact', '$course')";

        if (mysqli_query($conn, $sql)) {

          echo "<div class=' alert aler-success'>You are registered successfully.</div>";
        } else {
          echo "Something went wrong";
        }
      }
    }
    ?>
    <form action="store.php" class="form_registration" method="post">
      <h2>REGISTRATION</h2>
      <div class="form-group">
        <input type="text" class="form-control" name="fname" value="<?= !empty($fname) ? $fname : '' ?>" placeholder="First Name:">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="mname" value="<?= !empty($mname) ? $mname : '' ?>" placeholder="Middle Name:">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="lname" value="<?= !empty($lname) ? $lname : '' ?>" placeholder="Last Name:">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="email" value="<?= !empty($email) ? $email : '' ?>" placeholder="Email:">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="pass" placeholder="Password:">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact:">
      </div>
      <div class="form-group">
        <label for="">Courses</label>
        <select name="course" id="course" class="form-control inputs">
          <option value="math">Mathematics</option>
          <option value="cs">Computer Science</option>
          <option value="phys">Physics</option>
          <option value="chem">Chemistry</option>
        </select>
      </div>
      <div class="form-btn">
        <input type="submit" class="btn btn-primary" value="Sign up" name="submit">
        <div>
          <p>Already have an account? <a href="login.php">Login Here</a></p>
        </div>
      </div>
    </form>
  </div>
</body>

</html>