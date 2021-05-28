<?php
    $conn = mysqli_connect("localhost", "root", "", "fitness_data");
    $table_name='avinash2020_2';
    $sql = "ALTER TABLE $table_name ADD start_time TEXT not null;";
    
    if(mysqli_query($conn, $sql)){
        echo "Added column(s) successfully.";
    } else {
        echo "Error adding column(s) to table: " . mysqli_error($conn);
    }
?>