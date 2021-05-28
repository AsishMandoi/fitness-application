<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_data";

$table_name = 'avinash2020_2';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$json_data = file_get_contents('C:\xampp\htdocs\HFF\Strava data files and requirement\avinash_activities_ 4525870542.json');
$data = json_decode($json_data, true);
$keys = array_keys($data[0]);
for ($i=0; $i < count($keys); $i++){
    $keys[$i].=" TEXT not null";
}
$columns = implode(', ', $keys);

// sql to create table
$sql = "CREATE TABLE $table_name(_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ".$columns.");";
// echo $sql;

if (mysqli_query($conn, $sql)) {
  echo "Table " . $table_name . " created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>