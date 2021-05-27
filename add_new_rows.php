<?php
    $dbServName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "fitness_data";

    $conn = mysqli_connect($dbServName, $dbUserName, $dbPassword, $dbName);

    $json_data = file_get_contents('C:\xampp\htdocs\HFF\Strava data files and requirement\avinash_activities_12_2020.json');
    $data = json_decode($json_data, true);

    // foreach ($data[0] as $key => $value){
    //     echo gettype($key).' '.gettype($value).'<br>';
    // }

    foreach($data as &$row){
        $row['athlete']=json_encode($row['athlete']);
        $row['start_latlng']=json_encode($row['start_latlng']);
        $row['end_latlng']=json_encode($row['end_latlng']);
        $row['map']=json_encode($row['map']);
    }
    $cnt=0;
    foreach ($data as $row){
        $columns = implode(", ", array_keys($row));
        $values  = implode("', '", array_values($row));
        $sql = "INSERT INTO `avinash2020`($columns) VALUES ('$values')";
        // echo $sql."<br>";
        if (mysqli_query($conn, $sql)) $cnt++;
    }
    echo $cnt . " new rows were successfully added to avinash2020.<br>";
?>