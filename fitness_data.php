<!DOCTYPE html>
<html>
<head>
    <title>Abhinash's Fitness Page</title>
</head>

<body>
    <h2><b>Abhinash's Fitness Page</b></h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "fitness_data");
    $table_name = 'avinash2020'; $table2_name = 'avinash2020_2';
    
    // Count of data for each activity.
    $cnt_run = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Run';"));
    $cnt_ride = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Ride';"));
    $cnt_swim = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Swim';"));
    $cnt_walk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Walk';"));

    echo "<h4>Running Data</h4>";
    if($cnt_run>0){
        $run = mysqli_query($conn, "SELECT SUM(distance) AS tot_dist, SUM(average_speed) AS avg_sp, SUM(average_heartrate) AS avg_hr, SUM(total_elevation_gain) AS tot_el FROM $table_name WHERE type='Run';");
        $run_data = mysqli_fetch_assoc($run);
        echo "Total distance while running = " . $run_data['tot_dist'] . " metres <br>";
        echo "Total elevation while running = " . $run_data['tot_el'] . " metres <br>";
        echo "Average pace while running = " . ($run_data['avg_sp']/$cnt_run) . " m/s <br>";
        echo "Average heart rate while running = " . ($run_data['avg_hr']/$cnt_run) . " bpm <br>";
        $longest_run = mysqli_fetch_assoc(mysqli_query($conn, "SELECT start_date, SUM(distance) max_dist FROM $table_name WHERE type='Run' GROUP BY start_date having SUM(distance) = (select MAX(sum_dist) FROM (select SUM(distance) sum_dist FROM $table_name WHERE type='Run' GROUP BY start_date) tab);"));
        echo "Longest run = " . $longest_run['max_dist'] . " metres on " . $longest_run['start_date'] ."<br>";
        $highest_pace = mysqli_fetch_assoc((mysqli_query($conn, "SELECT start_date, SUM(distance) / SUM(moving_time) max_sp FROM $table_name WHERE type='Run' GROUP BY start_date having SUM(distance) / SUM(moving_time) = (select MAX(avg_speed) FROM (select SUM(distance) / SUM(moving_time) avg_speed FROM $table_name WHERE type='Run' GROUP BY start_date) tab);")));
        echo "Highest pace in a run = " . $highest_pace['max_sp'] . " m/s on " . $highest_pace['start_date'] ."<br>";
    } else {
        echo "No runs yet<br>";
    }
    echo "<br><h4>Cycling Data</h4>";
    if($cnt_ride>0){
        $ride = mysqli_query($conn, "SELECT SUM(distance) AS tot_dist, SUM(average_speed) AS avg_sp, SUM(average_heartrate) AS avg_hr, SUM(total_elevation_gain) AS tot_el FROM $table_name WHERE type='Ride';");
        $ride_data = mysqli_fetch_assoc($ride);
        echo "Total distance while riding = " . $ride_data['tot_dist'] . " metres <br>";
        echo "Total elevation while riding = " . $ride_data['tot_el'] . " metres <br>";
        echo "Average pace while riding = " . ($ride_data['avg_sp']/$cnt_ride) . " m/s <br>";
        echo "Average heart rate while riding = " . ($ride_data['avg_hr']/$cnt_ride) . " bpm <br>";
        $longest_ride = mysqli_fetch_assoc(mysqli_query($conn, "SELECT start_date, SUM(distance) max_dist from $table_name WHERE type='Ride' group by start_date having SUM(distance) = (select MAX(sum_dist) from (select SUM(distance) sum_dist from $table_name WHERE type='Ride' group by start_date) tab);"));
        echo "Longest ride = " . $longest_ride['max_dist'] . " metres on " . $longest_ride['start_date'] ."<br>";
        $highest_pace = mysqli_fetch_assoc((mysqli_query($conn, "SELECT start_date, SUM(distance) / SUM(moving_time) max_sp FROM $table_name WHERE type='Ride' GROUP BY start_date having SUM(distance) / SUM(moving_time) = (select MAX(avg_speed) FROM (select SUM(distance) / SUM(moving_time) avg_speed FROM $table_name WHERE type='Ride' GROUP BY start_date) tab);")));
        echo "Highest pace in a ride = " . $highest_pace['max_sp'] . " m/s on " . $highest_pace['start_date'] ."<br>";
    } else {
        echo "No rides yet<br>";
    }
    echo "<br><h4>Swimming Data</h4>";
    if($cnt_swim>0){
        $swim = mysqli_query($conn, "SELECT SUM(distance) AS tot_dist, SUM(average_speed) AS avg_sp, SUM(average_heartrate) AS avg_hr, SUM(total_elevation_gain) AS tot_el FROM $table_name WHERE type='Swim';");
        $swim_data = mysqli_fetch_assoc($swim);
        echo "Total distance while riding = " . $swim_data['tot_dist'] . " metres <br>";
        echo "Total elevation while riding = " . $swim_data['tot_el'] . " metres <br>";
        echo "Average pace while riding = " . ($swim_data['avg_sp']/$cnt_swim) . " m/s <br>";
        echo "Average heart rate while riding = " . ($swim_data['avg_hr']/$cnt_swim) . " bpm <br>";
        $longest_swim = mysqli_fetch_assoc(mysqli_query($conn, "SELECT start_date, SUM(distance) max_dist from $table_name WHERE type='Swim' group by start_date having SUM(distance) = (select MAX(sum_dist) from (select SUM(distance) sum_dist from $table_name WHERE type='Swim' group by start_date) tab);"));
        echo "Longest swim = " . $longest_swim['max_dist'] . " metres on " . $longest_swim['start_date'] ."<br>";
        $highest_pace = mysqli_fetch_assoc((mysqli_query($conn, "SELECT start_date, SUM(distance) / SUM(moving_time) max_sp FROM $table_name WHERE type='Swim' GROUP BY start_date having SUM(distance) / SUM(moving_time) = (select MAX(avg_speed) FROM (select SUM(distance) / SUM(moving_time) avg_speed FROM $table_name WHERE type='Swim' GROUP BY start_date) tab);")));
        echo "Highest pace in a swim = " . $highest_pace['max_sp'] . " m/s on " . $highest_pace['start_date'] ."<br>";
    } else {
        echo "No swims yet<br>";
    }
    echo "<br><h4>Walking Data</h4>";
    if($cnt_walk>0){
        $walk = mysqli_query($conn, "SELECT SUM(distance) AS tot_dist, SUM(average_speed) AS avg_sp, SUM(average_heartrate) AS avg_hr, SUM(total_elevation_gain) AS tot_el FROM $table_name WHERE type='Walk';");
        $walk_data = mysqli_fetch_assoc($walk);
        echo "Total distance while riding = " . $walk_data['tot_dist'] . " metres <br>";
        echo "Total elevation while riding = " . $walk_data['tot_el'] . " metres <br>";
        echo "Average pace while riding = " . ($walk_data['avg_sp']/$cnt_walk) . " m/s <br>";
        echo "Average heart rate while riding = " . ($walk_data['avg_hr']/$cnt_walk) . " bpm <br>";
        $longest_walk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT start_date, SUM(distance) max_dist from $table_name WHERE type='Walk' group by start_date having SUM(distance) = (select MAX(sum_dist) from (select SUM(distance) sum_dist from $table_name WHERE type='Walk' group by start_date) tab);"));
        echo "Longest walk = " . $longest_walk['max_dist'] . " metres on " . $longest_walk['start_date'] ."<br>";
        $highest_pace = mysqli_fetch_assoc((mysqli_query($conn, "SELECT start_date, SUM(distance) / SUM(moving_time) max_sp FROM $table_name WHERE type='Walk' GROUP BY start_date having SUM(distance) / SUM(moving_time) = (select MAX(avg_speed) FROM (select SUM(distance) / SUM(moving_time) avg_speed FROM $table_name WHERE type='Walk' GROUP BY start_date) tab);")));
        echo "Highest pace in a walk = " . $highest_pace['max_sp'] . " m/s on " . $highest_pace['start_date'] ."<br>";
    } else {    
        echo "No walks yet<br>";
    }
    echo "<br>";

    echo "<h4><u>Day wise Summary</u></h4>";
    $run_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, SUM(average_cadence) as cadence, start_date AS 'Date' FROM $table_name WHERE type='Run' GROUP BY start_date ORDER BY start_date;");
    $ride_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, start_date AS 'Date' FROM $table_name WHERE type='Ride' GROUP BY start_date ORDER BY start_date;");
    $swim_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, start_date AS 'Date' FROM $table_name WHERE type='Swim' GROUP BY start_date ORDER BY start_date;");
    $walk_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, SUM(average_cadence) as cadence, start_date AS 'Date' FROM $table_name WHERE type='Walk' GROUP BY start_date ORDER BY start_date;");
    
    $cal_run_per_day = mysqli_query($conn, "SELECT SUM(calories) AS cal, start_date FROM $table2_name WHERE type='Run' GROUP BY start_date ORDER BY start_date;");
    $cal_ride_per_day = mysqli_query($conn, "SELECT SUM(calories) AS cal, start_date FROM $table2_name WHERE type='Ride' GROUP BY start_date ORDER BY start_date;");
    $cal_swim_per_day = mysqli_query($conn, "SELECT SUM(calories) AS cal, start_date FROM $table2_name WHERE type='Swim' GROUP BY start_date ORDER BY start_date;");
    $cal_walk_per_day = mysqli_query($conn, "SELECT SUM(calories) AS cal, start_date FROM $table2_name WHERE type='Walk' GROUP BY start_date ORDER BY start_date;");

    $run_row = mysqli_fetch_assoc($run_per_day); $ride_row = mysqli_fetch_assoc($ride_per_day); $swim_row = mysqli_fetch_assoc($swim_per_day); $walk_row = mysqli_fetch_assoc($walk_per_day);
    $run_cal = mysqli_fetch_assoc($cal_run_per_day); $ride_cal = mysqli_fetch_assoc($cal_ride_per_day); $swim_cal = mysqli_fetch_assoc($cal_swim_per_day); $walk_cal = mysqli_fetch_assoc($cal_walk_per_day);    
    while($run_row || $ride_row || $swim_row || $walk_row || $run_cal || $ride_cal || $swim_cal || $walk_cal) {
        $date; $dist_run=0; $dist_ride=0; $dist_swim=0; $dist_walk=0; $time_run=0; $time_ride=0; $time_swim=0; $time_walk=0; $cadence_run=0; $cadence_walk=0; $cal_run=0; $cal_ride=0; $cal_swim=0; $cal_walk=0;
        if($run_row) { $date = $run_row['Date']; $dist_run=$run_row['dist']; $time_run=$run_row['time']; $cadence_run=$run_row['cadence'];}
        if($ride_row) { $date = $ride_row['Date']; $dist_ride=$ride_row['dist']; $time_ride=$ride_row['time'];}
        if($swim_row) { $date = $swim_row['Date']; $dist_swim=$swim_row['dist']; $time_swim=$swim_row['time'];}
        if($walk_row) { $date = $walk_row['Date']; $dist_walk=$walk_row['dist']; $time_walk=$walk_row['time']; $cadence_walk=$walk_row['cadence'];}
        if($run_cal) { $date = $run_cal['start_date']; $cal_run=$run_cal['cal'];}
        if($ride_cal) { $date = $ride_cal['start_date']; $cal_ride=$ride_cal['cal'];}
        if($swim_cal) { $date = $swim_cal['start_date']; $cal_swim=$swim_cal['cal'];}
        if($walk_cal) { $date = $walk_cal['start_date']; $cal_walk=$walk_cal['cal'];}
        
        echo "<b>" . $date . ":</b><br>";
        echo "You ran " . $dist_run. " metres for " . $time_run/60 . " minutes. You lost " . $cal_run . " calories by running. Your average cadence was " . $cadence_run . " steps/min.<br>";
        echo "You rode " . $dist_ride. " metres for " . $time_ride/60 . " minutes. You lost " . $cal_ride . " calories by cycling.<br>";
        echo "You swam " . $dist_swim. " metres for " . $time_swim/60 . " minutes. You lost " . $cal_swim . " calories by swimming.<br>";
        echo "You walked " . $dist_walk. " metres for " . $time_walk/60 . " minutes. You lost " . $cal_walk . " calories by walking. Your average cadence was " . $cadence_walk . " steps/min <br>";
        $run_row = mysqli_fetch_assoc($run_per_day); $ride_row = mysqli_fetch_assoc($ride_per_day); $swim_row = mysqli_fetch_assoc($swim_per_day); $walk_row = mysqli_fetch_assoc($walk_per_day);
        $run_cal = mysqli_fetch_assoc($cal_run_per_day); $ride_cal = mysqli_fetch_assoc($cal_ride_per_day); $swim_cal = mysqli_fetch_assoc($cal_swim_per_day); $walk_cal = mysqli_fetch_assoc($cal_walk_per_day);
        echo "<br>";
    }

    ?>



    <p style="text-align: center; font-size: x-small;">
        <br><br><br>© 2021 by Asish Mandoi. All rights reserved.
    </p>

</body>
</html>