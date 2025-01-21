<?php
session_start();
if (empty($_SESSION["user_id"]) && $_SESSION["usertype"] == "admin") {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jconfirm/jquery-confirm.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
</head>
<style>
  #saleForm {
            width: 50%;
            padding: 25px;
            background-color: #34495e;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            margin-left: 25%;
     }

        h2 {
            text-align: center;
            color: #ecf0f1;
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #bdc3c7;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #3b4b5b;
            border: none;
            border-radius: 5px;
            color: #ecf0f1;
        }

        input[type="text"]::placeholder {
            color: #7f8c8d;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #1abc9c;
            color: #ecf0f1;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #16a085;
        }

        #message {
            text-align: center;
            color: #1abc9c;
            margin-top: 10px;
        }

        /* Chart Container Styling */
        #chart-container {
            
            background-color: #34495e;
            
        }

        h3 {
            color: #ecf0f1;
            margin-bottom: 15px;
        }

        canvas {
            max-width: 100%;
            height: 400px;
        }

</style>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="home.php"><img src="images/logo2.jpg" class="logo"></a>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="scheduling.php" style="--clr:#">Schedule</a></li>
                <li>
                    <div class="dropdown" style="--clr:#">
                        <a href="" class="dropbtn">Maintenance</a>
                        <div class="dropdown-content">
                            <a href="customer.php" style="--clr:#">Customer</a>
                            <a href="userlist.php" style="--clr:#">User</a>
                            <a href="instructor.php" style="--clr:#">Instructor</a>
                            <a href="supplier.php" style="--clr:#">Supplier</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="" class="dropbtn">Product Maintenance</a>
                        <div class="dropdown-content">
                            <a href="item.php">Product</a>
                            <a href="product_category.php">Product Category</a>
                        </div>
                    </div>
                </li>
                <li><a href="inventory.php" style="--clr:#">Inventory</a></li>
                <!-- <li><a href="transaction.php" style="--clr:#">Transaction</a></li> -->
                <li><a href="logout.php" style="--clr:#">Log Out</a></li>
            </ul>
            <div class="clock">
                <span id="hours">00</span>
                <span>:</span>
                <span id="min">00</span>
                <span>:</span>
                <span id="sec">00</span>
            </div>
        </div>
    </div>

    <?php require_once "config/database.php";
    $sql = "SELECT * FROM tblsales";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $product[] = $row['product'];
        $quantity[] = $row['quantity'];
        $amount[] = $row['amount'];

    }
    ?>
    <form id="saleForm">
        <h2>Record Sale</h2>
        <label for="product">Product Name:</label>
        <input type="text" id="product" name="product" required>

        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" required>

        <label for="amount">Amount of sale:</label>
        <input type="text" id="amount" name="amount" required>

        <button type="submit">Record Sale</button>

        <div id="message"></div>
    </form>

   

    <!-- <div>
        <canvas id="chartsjs_bar" style="width: 60%; height: 20%"></canvas>
    </div> -->
    <div id="chart-container">
        <h3>Sales Analytics</h3>
        <canvas id="salesChart"></canvas>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Quantity Sold',
                    data: [], 
                    backgroundColor: 'rgba(75, 192, 192, 0.7)', 
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Total Revenue (₱)',
                    data: [], 
                    backgroundColor: 'rgba(153, 102, 255, 0.7)', 
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        
        function loadSalesData() {
            $.ajax({
                url: 'config/data.php',
                type: 'GET',
                success: function(response) {
                    var salesData = JSON.parse(response);
                    salesChart.data.labels = salesData.labels;
                    salesChart.data.datasets[0].data = salesData.quantity;
                    salesChart.data.datasets[1].data = salesData.revenue;
                    salesChart.update();
                }
            });
        }

        
        loadSalesData();

        
        $(document).ready(function() {
            $("#saleForm").on("submit", function(event) {
                event.preventDefault();

                var formData = {
                    product: $("#product").val(),
                    quantity: $("#quantity").val(),
                    amount: $("#amount").val()
                };

                $.ajax({
                    url: 'config/record.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $("#message").html(response); 
                        loadSalesData(); 
                    },
                    error: function() {
                        $("#message").html("Error processing the request.");
                    }
                });
            });
        });
    </script>

    <!-- <script>
        var ctx = $("#chartsjs_bar");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($product); ?>,
                datasets: [{
                    data: <?php echo json_encode($sales); ?>,
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
            }

        });
    </script> -->

    <!-- </nav> -->

    <!-- Custom Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='js/jconfirm/jquery-confirm.js'></script>
    <script src="js/scripts.js"></script>
    <script type='text/javascript' src='js/navbar.js'></script>
    <script type='text/javascript' src='js/clock.js'></script>

</body>

</html>