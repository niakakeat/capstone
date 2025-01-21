<?php require_once "config/database.php";
$sql = "SELECT * FROM tblsales";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $product[] = $row['product'];
    $sales[] = $row['sales'];
}
?>

<?php
// if (!$conn) {
//     // echo "Disconnected!!" . mysqli_error();
// } else {
// }
?>

<div>
    <canvas id="chartsjs_bar" style="width: 60%; height: 20%"></canvas>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
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
</script>