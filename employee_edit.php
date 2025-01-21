<?php
require_once "config/database.php";
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "staff") {
    header("location: index.php");
    die();
}
if (!empty($_POST['submit'])) {


    $user_id = $_SESSION['user_id'];
    $uname = $_POST["uname"];
    $upass = $_POST["upass"];

    if (!empty($_FILES['image']['name'])) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $target_dir = "images/Employees/";
        $target_file = $target_dir . basename($fileName);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($fileTmpPath);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }

        // Check file size
        // if ($_FILES["fileToUpload"]["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($fileTmpPath, $target_file)) {
                // echo "The file " . htmlspecialchars(basename($fileName)) . " has been uploaded.";
            } else {
                // echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "UPDATE user SET uname='$uname', upass='$upass', image='$fileName' WHERE id='$user_id' ";
        $query_run = mysqli_query($conn, $query);
        die();
    }
    //     echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
    // die();
    $query = "UPDATE user SET uname='$uname', upass='$upass' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/edit.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
    require_once "config/database.php";
    $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM user WHERE id='$user_id' ";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    ?>


    <div class="container">

        <form action="employee_edit.php" class="editprofile" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" id="edit_id" value="">


            <div class="form_login">
                <h1 id="form_h1">Edit Profile</h1>

                <div class="user-img">
                    <img src="images/Employees/<?php echo $row['image']; ?>" height="100" alt="" width="90">
                    <input type="file" id="file" name="image">
                    <label for="file" id="uploadbtn"> <i class="fas fa-camera"></i></label>
                </div>

                <label for="uname"><b>Full Name</b></label>
                <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo $row['uname'] ?>" name="uname" required>

                <label for="upass"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" value="<?php echo $row['upass'] ?>" name="upass" required>

                <input type="submit" class="btn btn-primary" value="Save" id="submit" name="submit">
                <div>
                    <a href="employee.php" style="--clr:#">Back</a>

                </div>
            </div>
        </form>
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
    <script type='text/javascript' src='js/profilepic.js'></script>
    <!-- <script type='text/javascript' src='js/employee.js'></script> -->
</body>

</html>