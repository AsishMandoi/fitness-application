<?php
    $dbServName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "fitness_data";

    $table_name = 'avinash2020_2';

    $conn = mysqli_connect($dbServName, $dbUserName, $dbPassword, $dbName);

    $json_data = file_get_contents('C:\xampp\htdocs\HFF\Strava data files and requirement\avinash_activities_ 4525870542.json');
    $data = json_decode($json_data, true);

    // foreach ($data[0] as $key => $value){
    //     echo gettype($key).' '.gettype($value).'<br>';
    // }

    foreach($data as &$row){
        $row['athlete']=json_encode($row['athlete']);
        $row['start_latlng']=json_encode($row['start_latlng']);
        $row['end_latlng']=json_encode($row['end_latlng']);
        $row['map']=json_encode($row['map']);
        $row['segment_efforts']=json_encode($row['segment_efforts']);
        $row['splits_metric']=json_encode($row['splits_metric']);
        $row['splits_standard']=json_encode($row['splits_standard']);
        $row['laps']=json_encode($row['laps']);
        $row['best_efforts']=json_encode($row['best_efforts']);
        $row['photos']=json_encode($row['photos']);
        $row['similar_activities']=json_encode($row['similar_activities']);
        $row['available_zones']=json_encode($row['available_zones']);
    }
    $cnt=0;
    foreach ($data as $row){
        $columns = implode(", ", array_keys($row));
        $values  = implode("', '", array_values($row));
        $sql = "INSERT INTO $table_name($columns) VALUES ('$values')";
        // echo $sql."<br>";
        if (mysqli_query($conn, $sql)) $cnt++;
    }
    echo $cnt . " new rows were successfully added to " . $table_name . "<br>";
?>