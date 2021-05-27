<!-- 
#1. What is my average pace
#2. What is my longest run and when............................................................................*****
*3. Total calorie burned in a day and calorie burned by activity...............................................*****
 4. My activity summary for today [x km (run. steps, cycling ), workout],......................................*****
#5. How am I performing during one activity ( distance, pace, heart rate, elevation) - presenatation
 6. Longest streak / Longest break/ current  break
*7. Personal record (highest pace, longest run/walk.ride), most active day(highest calorie burn))..............*****

Anything you think that can ne added...
-->
<!DOCTYPE html>
<html>
<head>
    <title>Abhinash's Fitness Page</title>
</head>

<body>
    <h2><b>Abhinash's Fitness Page</b></h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "fitness_data");
    $table_name = 'avinash2020';
    
    // All data for each activity.
    $run = mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Run';");
    $ride = mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Ride';");
    $swim = mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Swim';");
    $walk = mysqli_query($conn, "SELECT * FROM $table_name WHERE type='Walk';");

    // Total of each values for individual activities (Average can also be calculated from this data).
    $run_dist = mysqli_query($conn, "SELECT SUM(distance) FROM $table_name WHERE type='Run';");
    $ride_dist = mysqli_query($conn, "SELECT SUM(distance) FROM $table_name WHERE type='Ride';");
    $swim_dist = mysqli_query($conn, "SELECT SUM(distance) FROM $table_name WHERE type='Swim';");
    $walk_dist = mysqli_query($conn, "SELECT SUM(distance) FROM $table_name WHERE type='Walk';");
    $run_speed = mysqli_query($conn, "SELECT SUM(average_speed) FROM $table_name WHERE type='Run';");
    $ride_speed = mysqli_query($conn, "SELECT SUM(average_speed) FROM $table_name WHERE type='Ride';");
    $swim_speed = mysqli_query($conn, "SELECT SUM(average_speed) FROM $table_name WHERE type='Swim';");
    $walk_speed = mysqli_query($conn, "SELECT SUM(average_speed) FROM $table_name WHERE type='Walk';");
    $run_hr = mysqli_query($conn, "SELECT SUM(average_heartrate) FROM $table_name WHERE type='Run';");
    $ride_hr = mysqli_query($conn, "SELECT SUM(average_heartrate) FROM $table_name WHERE type='Ride';");
    $swim_hr = mysqli_query($conn, "SELECT SUM(average_heartrate) FROM $table_name WHERE type='Swim';");
    $walk_hr = mysqli_query($conn, "SELECT SUM(average_heartrate) FROM $table_name WHERE type='Walk';");
    $run_elevation = mysqli_query($conn, "SELECT SUM(total_elevation_gain) FROM $table_name WHERE type='Run';");
    $ride_elevation = mysqli_query($conn, "SELECT SUM(total_elevation_gain) FROM $table_name WHERE type='Ride';");
    $swim_elevation = mysqli_query($conn, "SELECT SUM(total_elevation_gain) FROM $table_name WHERE type='Swim';");
    $walk_elevation = mysqli_query($conn, "SELECT SUM(total_elevation_gain) FROM $table_name WHERE type='Walk';");

    $longest_run=mysqli_query($conn, "SELECT MAX(distance), start_date FROM $table_name WHERE type='Run'");
    $longest_ride=mysqli_query($conn, "SELECT MAX(distance), start_date FROM $table_name WHERE type='Ride'");
    $longest_swim=mysqli_query($conn, "SELECT MAX(distance), start_date FROM $table_name WHERE type='Swim'");
    $longest_walk=mysqli_query($conn, "SELECT MAX(distance), start_date FROM $table_name WHERE type='Walk'");
    
    // $calorie = "SELECT SUM(average_speed) AS Average_Speed FROM $table_name WHERE type='Run';";

    $cnt_run=mysqli_num_rows($run);
    $cnt_ride=mysqli_num_rows($ride);
    $cnt_swim=mysqli_num_rows($swim);
    $cnt_walk=mysqli_num_rows($walk);
    echo "<h4>Running Data</h4>";
    if($cnt_run>0){
        echo "Total distance while running = " . current((array)mysqli_fetch_assoc($run_dist)) . " metres <br>";
        echo "Total elevation while running = " . current((array)mysqli_fetch_assoc($run_elevation)) . " metres <br>";
        echo "Average pace while running = " . (current((array)mysqli_fetch_assoc($run_speed))/$cnt_run) . " m/s <br>";
        echo "Average heart rate while running = " . (current((array)mysqli_fetch_assoc($run_hr))/$cnt_run) . " bpm <br>";
        $values = array_values((array)mysqli_fetch_assoc($longest_run));
        echo "Longest run = " . $values[0] . " metres on " . $values[1] ."<br>";
    }
    echo "<br><h4>Cycling Data</h4>";
    if($cnt_ride>0){
        echo "Total distance while cycling = " . current((array)mysqli_fetch_assoc($ride_dist)) . " metres <br>";
        echo "Total elevation while cycling = " . current((array)mysqli_fetch_assoc($ride_elevation)) . " metres <br>";
        echo "Average pace while cycling = " . (current((array)mysqli_fetch_assoc($ride_speed))/$cnt_ride) . " m/s <br>";
        echo "Average heart rate while cycling = " . (current((array)mysqli_fetch_assoc($ride_hr))/$cnt_ride) . " bpm <br>";
        $values = array_values((array)mysqli_fetch_assoc($longest_ride));
        echo "Longest ride = " . $values[0] . " metres on " . $values[1] ."<br>";
    } else {
        echo "No rides yet<br>";
    }
    echo "<br><h4>Swimming Data</h4>";
    if($cnt_swim>0){
        echo "Total distance while swimming = " . current((array)mysqli_fetch_assoc($swim_dist)) . " metres <br>";
        echo "Total elevation while swimming = " . current((array)mysqli_fetch_assoc($swim_elevation)) . " metres <br>";
        echo "Average pace while swimming = " . (current((array)mysqli_fetch_assoc($swim_speed))/$cnt_swim) . " m/s <br>";
        echo "Average heart rate while swimming = " . (current((array)mysqli_fetch_assoc($swim_hr))/$cnt_swim) . " bpm <br>";
        $values = array_values((array)mysqli_fetch_assoc($longest_swim));
        echo "Longest swim = " . $values[0] . " metres on " . $values[1] ."<br>";
    } else {
        echo "No swims yet<br>";
    }
    echo "<br><h4>Walking Data</h4>";
    if($cnt_walk>0){
        echo "Total distance while walking = " . current((array)mysqli_fetch_assoc($walk_dist)) . " metres <br>";
        echo "Total elevation while walking = " . current((array)mysqli_fetch_assoc($walk_elevation)) . " metres <br>";
        echo "Average pace while walking = " . (current((array)mysqli_fetch_assoc($walk_speed))/$cnt_walk) . " m/s <br>";
        echo "Average heart rate while walking = " . (current((array)mysqli_fetch_assoc($walk_hr))/$cnt_walk) . " bpm <br>";
        $values = array_values((array)mysqli_fetch_assoc($longest_walk));
        echo "Longest walk = " . $values[0] . " metres on " . $values[1] ."<br>";
    } else {    
        echo "No walks yet<br>";
    }
    echo "<br>";

    echo "<h4><u>Day wise Summary</u></h4>";
    $run_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, start_date AS 'Date' FROM $table_name WHERE type='Run' GROUP BY start_date ORDER BY start_date;");
    $ride_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, start_date AS 'Date' FROM $table_name WHERE type='Ride' GROUP BY start_date ORDER BY start_date;");
    $swim_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, start_date AS 'Date' FROM $table_name WHERE type='Swim' GROUP BY start_date ORDER BY start_date;");
    $walk_per_day = mysqli_query($conn, "SELECT SUM(distance) AS dist, SUM(moving_time) AS time, start_date AS 'Date' FROM $table_name WHERE type='Walk' GROUP BY start_date ORDER BY start_date;");
    
    $run_row = mysqli_fetch_assoc($run_per_day); $ride_row = mysqli_fetch_assoc($ride_per_day); $swim_row = mysqli_fetch_assoc($swim_per_day); $walk_row = mysqli_fetch_assoc($walk_per_day);
    while($run_row || $ride_row || $swim_row || $walk_row) {
        $date; $dist_run=0; $dist_ride=0; $dist_swim=0; $dist_walk=0; $time_run=0; $time_ride=0; $time_swim=0; $time_walk=0;
        if($run_row){
            $date = $run_row['Date']; $dist_run=$run_row['dist']; $time_run=$run_row['time'];
        }
        if($ride_row){
            $date = $ride_row['Date']; $dist_ride=$ride_row['dist']; $time_ride=$ride_row['time'];
        }
        if($swim_row){
            $date = $swim_row['Date']; $dist_swim=$swim_row['dist']; $time_swim=$swim_row['time'];
        }
        if($walk_row){
            $date = $walk_row['Date']; $dist_walk=$walk_row['dist']; $time_walk=$walk_row['time'];
        }
        echo "<b>" . $date . ":</b><br>";
        echo "You ran " . $dist_run. " metres for " . $time_run/60 . " minutes.<br>";
        echo "You rode " . $dist_ride. " metres for " . $time_ride/60 . " minutes.<br>";
        echo "You swam " . $dist_swim. " metres for " . $time_swim/60 . " minutes.<br>";
        echo "You walked " . $dist_walk. " metres for " . $time_walk/60 . " minutes.<br>";
        $run_row = mysqli_fetch_assoc($run_per_day); $ride_row = mysqli_fetch_assoc($ride_per_day); $swim_row = mysqli_fetch_assoc($swim_per_day); $walk_row = mysqli_fetch_assoc($walk_per_day);
        echo "<br>";
    }
    ?>



    <p style="text-align: center; font-size: x-small;">
        <br><br><br>© 2021 by Asish Mandoi. All rights reserved.
    </p>

</body>
</html>