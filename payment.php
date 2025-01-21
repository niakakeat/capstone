<?php
require_once "config/database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idType = $_POST['idType'];
    $gender = $_POST['gender'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $postalCode = $_POST['postalCode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $promoCode = $_POST['promoCode'];
    $referralCode = $_POST['referralCode'];

    // Process the data (e.g., save to database or call a payment API)
    
    echo "Payment processed successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review and Pay</title>
    <link rel="stylesheet" href="css/payment.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="review-pay">
            <h1>REVIEW AND PAY</h1>
            <div class="content">
                <!-- Personal Details -->
                <div class="section personal-details">
                    <h2>Personal Details</h2>
                    <div class="details">
                        <p><strong>First Name:</strong> Rafael</p>
                        <p><strong>Last Name:</strong> Las Marías</p>
                        <p><strong>Date of Birth:</strong> 14 Mar 2003</p>
                        <p><strong>Email:</strong> lasmariasrafael03@gmail.com</p>
                        <p><strong>Mobile Number:</strong> +63 9184833568</p>
                        <a href="#" class="edit-details">Edit Details</a>
                    </div>
                </div>

                <!-- Membership Overview -->
                <div class="section membership-overview">
                    <h2>Membership Overview</h2>
                    <p><strong>Home Club:</strong> Ayala Avenue</p>
                    <p><strong>Start Date:</strong> 17 Oct 2024</p>
                    <p><strong>Duration:</strong> 12 Months</p>
                </div>

                <!-- Plan Details -->
                <div class="section plan-details">
                    <h2>Plan Details</h2>
                    <p><strong>Home Club Package (billed monthly):</strong> PHP 2,390.00</p>
                    <p><strong>Included:</strong> Ayala Avenue, 12 Months</p>
                    <p><strong>Total Monthly Recurring Charges:</strong> PHP 2,390.00</p>
                    <p><strong>Total First Billing (on 31 Oct 2024):</strong> PHP 2,390.00</p>
                </div>

                <!-- Pro Rata Package Plan -->
                <div class="section pro-rata">
                    <h2>Pro Rata Package Plan</h2>
                    <p><strong>Gym Access:</strong> PHP 1,079.35</p>
                    <p><strong>Total Payment:</strong> PHP 1,079.35 (inclusive of 12% VAT)</p>
                    <p>* Monthly billing of PHP 2,390.00 will start on 31 Oct 2024</p>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <div class="profile-form">
            <h2>Profile</h2>
            <form action="process_payment.php" method="POST">
                <div class="form-group">
                    <label for="idType">ID Type</label>
                    <select id="idType" name="idType">
                        <option value="govtId">Govt Issued ID</option>
                        <option value="passport">Passport</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address1">Address Line 1</label>
                    <input type="text" id="address1" name="address1" required>
                </div>
                <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" id="address2" name="address2">
                </div>
                <div class="form-group">
                    <label for="postalCode">Postal Code</label>
                    <input type="text" id="postalCode" name="postalCode" required>
                </div>
                <div class="form-group">
                    <label for="city">City/State/Province</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="Philippines" readonly>
                </div>

                <!-- Promo/Referral Code -->
                <div class="form-group">
                    <label for="promoCode">Promo Code</label>
                    <input type="text" id="promoCode" name="promoCode">
                    <button type="button" onclick="applyPromo()">Apply</button>
                </div>
                <div class="form-group">
                    <label for="referralCode">Referral Code</label>
                    <input type="text" id="referralCode" name="referralCode">
                    <button type="button" onclick="applyReferral()">Apply</button>
                </div>

                <button type="submit" class="confirm-btn">Confirm Details</button>
            </form>
        </div>
    </div>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/payment.js'></script>

</body>
</html>
