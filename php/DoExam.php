<?php

echo "<h2>The Exam will become avaliable once it's the Starting of the Exam</h3>";

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "lib";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
    $sql = "SELECT ExamID, ExamDate, StartTime, EndTime FROM question";
    $result = $conn->query($sql);
    $temp = "";
    $time = "";

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                if($temp != $row["ExamID"]) {
                    echo "Exam ID: ". $row["ExamID"]. " The Exam will be held on ". $row["ExamDate"]. 
                    ".  From ". $row["StartTime"]. " to ". $row["EndTime"]. "<br><br>";
                    $temp = $row["ExamID"];
                }
            }
            } else {
                echo "There are no exam.";
                }



    mysqli_close($conn);    
?>  



