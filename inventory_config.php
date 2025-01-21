<?php 
require 'database.php';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// die();
    

if(!empty($_POST['edit_inventory'])){
    $inventory_id = $_POST['inventory_id'];
    $query = "SELECT * FROM tblinventory WHERE id='$inventory_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_inventory'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $sold = $_POST['sold'];
    $earned = $_POST['earned'];
    $quantity = $_POST['quantity'];
    
    if (!empty($_FILES['image']['name'])) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $target_dir = "../images/Item/";
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
        $query = "INSERT INTO tblinventory (name, code, description, stock, price, sold, earned, quantity, image) VALUES ( '$name', '$code', '$description', '$stock', '$price', '$sold', '$earned', '$quantity', '$fileName')";   
        $query_run = mysqli_query($conn, $query);
    
        if ($query_run) {
            echo json_encode([
                'ito' => ''
            ]);
        }
        die();
    }

    $query = "INSERT INTO tblinventory (name, code, description, stock, price, sold, earned, quantity) VALUES ( '$name', '$code', '$description', '$stock', '$price', '$sold', '$earned', '$quantity')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_inventory'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $sold = $_POST['sold'];
    $earned = $_POST['earned'];
    $quantity = $_POST['quantity'];
    $inventory_id = $_POST['inventory_id'];

    if (!empty($_FILES['image']['name'])) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $target_dir = "../images/Item/";
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

        $query = "UPDATE tblinventory SET name='$name', code='$code', description='$description', stock='$stock', price='$price', sold='$sold', earned='$earned', quantity='$quantity', image='$fileName' WHERE id='$inventory_id' ";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo json_encode([
                'ito' => ''
            ]);
        }
        die();
    }


    $query = "UPDATE tblinventory SET name='$name', code='$code', description='$description', stock='$stock', price='$price', sold='$sold', earned='$earned', quantity='$quantity' WHERE id='$inventory_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['isdeactivate_inventory'])) {
    $inventory_id = $_POST['inventory_id'];
    $query = "UPDATE tblinventory SET status='0' WHERE id='$inventory_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Deactivated'
    ]);
}

if (!empty($_POST['isactivate_inventory'])) {
    $inventory_id = $_POST['inventory_id'];
    $query = "UPDATE tblinventory SET status='1' WHERE id='$inventory_id' ";
    $query_run = mysqli_query($conn, $query);
    

    echo json_encode([
        'msg' => 'Successfully Activated'
    ]);
}
?>