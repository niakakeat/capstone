<?php 
require 'database.php';
$mysqli = new mysqli("localhost","root","","tattoo_gym");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(!empty($_POST['edit_tutorial'])){
    $tutorial_id = $_POST['tutorial_id'];
    $query = "SELECT * FROM tbltutorial WHERE id='$tutorial_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_add_tutorial'])) {
    $title = $_POST['title'];
    $content = $mysqli -> real_escape_string ($_POST['content']);
    $query = "INSERT INTO tbltutorial (title, content) VALUE ('$title', '$content')";   
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        
        $mysqli -> close();

        echo json_encode([
            'ito' => ''
        ]);
    }
}
if (!empty($_POST['is_edit_tutorial'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $tutorial_id = $_POST['tutorial_id'];


    $query = "UPDATE tbltutorial SET title='$title', content='$content' WHERE id='$category_id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo json_encode([
            'ito' => ''
        ]);
    }
}



?>