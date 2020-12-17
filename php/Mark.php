<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "lib";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ExamID, StudentMark FROM studentans";
$result = mysqli_query($conn, $sql);
$datas = array();
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
        }
}

$average = array_sum($datas);
echo $average;

?>