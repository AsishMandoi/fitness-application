<?php
    $conn = mysqli_connect("localhost", "root", "", "fitness_data");

    $sql = "ALTER TABLE avinash2020 ADD start_time TEXT not null;";
    
    if(mysqli_query($conn, $sql)){
        echo "Added column(s) successfully.";
    } else {
        echo "Error adding column(s) to table: " . mysqli_error($conn);
    }
?>