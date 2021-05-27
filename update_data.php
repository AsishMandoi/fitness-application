<?php
    $conn = mysqli_connect("localhost", "root", "", "fitness_data");

    $sql = "UPDATE avinash2020 SET start_time=substr(start_date, 12, 8)";
    
    if(mysqli_query($conn, $sql)){
        echo "Updated data successfully.<br>";
    } else {
        echo "Error updating data: " . mysqli_error($conn) . "<br>";
    }
    $sql = "UPDATE avinash2020 SET start_date=substr(start_date, 1, 10)";
    
    if(mysqli_query($conn, $sql)){
        echo "Updated data successfully.<br>";
    } else {
        echo "Error updating data: " . mysqli_error($conn) . "<br>";
    }
?>