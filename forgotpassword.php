<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/forgotpass.css?v=<?php echo time(); ?>">
</head>
<style>
        
    </style>

<body>

    <div class="container">
        <form method="post" action="send-password-reset.php">
            <!-- User enters email here -->
            
                <h1 id="form_h1">Forgot Password</h1>
                <p>Please enter your email address to reset your password.</p>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <button type="submit">Reset Password</button>
                <p>Remember your password? <a href="index.php">Login here</a></p>
            
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>