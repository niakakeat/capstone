<?php
session_start();
if(empty($_SESSION['user_id'])){
    header("location: index.php");
    die();
}

if(!empty($_SESSION['id']) && !empty($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Hello <?php echo $_SESSION['user_name']; ?></h1>
       
        
    </body>
    </html>
    <?php
}
    else {
        header("Location: dashboard.php");
        exit();
    
}
?>