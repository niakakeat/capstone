<?php
require_once "config/database.php";
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] != "user") {
    header("location: index.php");
    die();
}

$_SESSION["id"] = 1;
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $sessionId"));


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
    


    <div class="container">

        <form action="editprofile.php" class="editprofile" method="POST">
            <input type="hidden" name="edit_id" id="edit_id">


            <div class="form_login">
                <h1 id="form_h1">Edit Profile</h1>

                    <div class="user-img">
                        <?php
                        $id =   $user["id"];
                        $uname = $user["uname"];
                        $image = $user["image"];
                        ?>
                        <img src="images/<?php echo $image; ?>" height="100" alt="" width="90" title="<?php echo $image; ?>">
                        <input type="file" id="file" accept="image/png, image/jpeg, image/jpg" name="image">
                        <label for="file" id="uploadbtn"> <i class="fas fa-camera"></i></label>
                    </div>

                <label for="uname"><b>Full Name</b></label>
                <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo $_SESSION['uname'] ?>" name="uname" required>

                <input type="submit" class="btn btn-primary" value="Save" id="submit" name="submit">
                <div>
                    <a href="profile.php" style="--clr:#">Back</a>

                </div>
            </div>
        </form>
    </div>




<script type='text/javascript'>
    document.getElementById("image").onchange = function(){
  document.getElementById('form').submit();
}
</script>
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
    <script type='text/javascript' src='js/employee.js'></script>
    <?php
    if(isset($_FILES["image"]["name"])){
        $id = $_POST["id"];
        $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];


        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.',  $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo
             "
             <script> 
             alert('Invalid Image Extension');
             document.location.href = '../editprofile';
             </script>
            "
            ;
        }
        elseif ($imageSize > 1200000){
            echo
             "
             <script> 
             alert('Image size is too large');
             document.location.href = '../editprofile';
             </script>
            "
            ;
        }
        else{
            $newImageName = $name . " _ " . date("Y.m.d") . " _ " . date("h.i.sa");
            $mewImageName .= "." . $imageExtension;
            $query = "UPDATE  user SET image = '$newImageName' WHERE id = $id";
            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            echo 
            "
             <script> 
             alert('Invallid Image Extension');
             document.location.href = '../editprofile';
             </script>
            "
            ;
        }

    }
    ?>
</body>

</html>