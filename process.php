<?php
require_once "config/database2.php";

// Function to send email notification
function sendEmailNotification($name, $email, $message) {
    $to = "#"; // Replace with your email address
    $subject = "New Message from Contact Form";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message: $message\n";

    // Send email
    mail($to, $subject, $email_body);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Insert data into the database
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
        if(mysqli_query($conn, $sql)){
            echo "Message sent successfully.";
            // Send email notification
            sendEmailNotification($name, $email, $message);
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
}
?>



















 <!-- <?php
                    require_once "config/database.php";


                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
                           
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $message = $_POST['message'];
                       

                            $errors = array();

                            if (empty($name) or empty($email) or empty($subject) or empty($message)) {
                                array_push($errors, "All fields are required");
                            }
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                array_push($errors, "Email is not valid");
                            }
                            if (strlen($message) < 8) {
                                array_push($errors, "No Input");
                            }
                        }

                        if (count($errors) > 0) {
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        } else {
                            $sql = "INSERT INTO tblcontact (name, email, subject, message) VALUES ( '$name', '$email', '$subject', '$message')";
            
                            if (mysqli_query($conn, $sql)) {
            
                                echo "<div class=' alert aler-success'>Your Message was sent successfully.</div>";
                            } else {
                                echo "Something went wrong";
                            }
                        }
                    }
                      
                    ?> -->