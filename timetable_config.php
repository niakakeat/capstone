<?php
require 'database.php';

if (!empty($_POST['edit_event'])) {
    $event_id = $_POST['event_id'];
    $query = "SELECT * FROM tblevent WHERE event_id='$event_id' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);

    echo json_encode([
        'data' => $row
    ]);
}

if (!empty($_POST['is_submit_event'])) {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];
    $event_start_time = $_POST['event_start_time'];
    $event_end_time = $_POST['event_end_time'];
    $instructor = $_POST['instructor'];
    


    if (!empty($event_id)) {
        $query = "UPDATE tblevent SET event_name='$event_name', event_start_date='$event_start_date', event_end_date='$event_end_date', event_start_time='$event_start_time', event_end_time='$event_end_time' WHERE event_id='$event_id' ";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo json_encode([
                'ito' => ''
            ]);
        }
    } else {
        $query = "INSERT INTO tblevent (event_name, event_start_date, event_end_date, event_start_time, event_end_time, instructor) VALUES ( '$event_name', '$event_start_date', '$event_end_date', '$event_start_time', '$event_end_time', '$instructor')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo json_encode([
                'ito' => ''
            ]);
        }
    }
}
if (!empty($_POST['is_get_event'])) {
    $display_query = "select event_id,event_name,event_start_date,event_end_date,event_start_time,event_end_time from tblevent";
    $results = mysqli_query($conn, $display_query);
    $count = mysqli_num_rows($results);
    if ($count > 0) {
        $data_arr = array();
        $i = 1;
        while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $data_arr[$i]['event_id'] = $data_row['event_id'];
            $data_arr[$i]['title'] = $data_row['event_name'];
            $data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['event_start_date'])) . 'T' . date("H:i:s", strtotime($data_row['event_start_time']));
            $data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['event_end_date'])) . 'T' . date("H:i:s", strtotime($data_row['event_end_time']));
            $data_arr[$i]['color'] = '#' . substr(uniqid(), 6);
            $data_arr[$i]['allDay'] = $data_row['event_start_time'] == '00:00:00' && $data_row['event_end_time'] == '00:00:00' ? true : false;
            $i++;
        }
        $data = array(
            'status' => true,
            'msg' => 'successfully',
            'data' => $data_arr
        );
    } else {
        $data = array(
            'status' => false,
            'msg' => 'Error!'
        );
    }
    // echo '<pre>';
    //             print_r($data);
    //             echo '</pre>';
    //             die();
    echo json_encode($data);
}

if (!empty($_POST['is_get_instructor'])) {
    $temp = [];
    $array_instructor = [];

    $date_start = !empty($_POST['date_start']) ? $_POST['date_start'] : null;
    $date_end = !empty($_POST['date_end']) ? $_POST['date_end'] : null;
    
    if(!empty($date_start) && !empty($date_end)){
        $sql_instructor = "
            select
                instructor
            from
                tblevent 
            WHERE 
            (
                (
                    event_start_date BETWEEN '$date_start' AND '$date_end'
                )
                OR 
                (
                    event_end_date BETWEEN '$date_start' AND '$date_end'
                )
            )
        ";
        $result_instructor = mysqli_query($conn, $sql_instructor);
        while ($row = mysqli_fetch_assoc($result_instructor)) {
            $array_instructor[] = $row['instructor'];
        }
    
        $instructor_ids = implode(", ",$array_instructor);
    }


    $query = "select * from tblinstructor where status=1";
    if(!empty($array_instructor)){
        $query .= " AND id not in ($instructor_ids)";
    }
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $temp[] = [
            'id' => $row['id'],
            'fname' => $row['fname'],
            'mname' => $row['mname'],
            'lname' => $row['lname']

        ];
    }
    echo json_encode($temp);
    // echo '<pre>';
    // print_r($temp);
    // echo '</pre>';
    // die();
}
