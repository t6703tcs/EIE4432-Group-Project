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

$sql = "SELECT* FROM studentans INNER JOIN question ON studentans.QuestionID = question.QuestionID";
$result = $conn->query($sql);
?>
<table border='1' id="Examdata" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Exam ID</th>
            <th scope="col">Marks</th>
            <th scope="col">Submittion Time</th>

        </tr>
    </thead>


    <?php
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $selectedID = $row['ID'];
            echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['ExamID'] . "</td><td>" . $row['StudentMark'] . 
            "</td><td>" . $row['SubTime'] . "</td></tr>";  
    ?>

</table>

    <?php
        }
    } else {
        echo "No Record Found";
    }

    mysqli_close($conn);
    ?>