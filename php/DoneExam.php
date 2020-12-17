<?php
// Start the session
session_start();
date_default_timezone_set("Asia/Hong_Kong");
?>

<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "lib";

// $ExamID = $_POST['ExamID'];
// $QuestionID = $_POST['QuestionID'];

$Answer = '';
$ID = htmlspecialchars($_COOKIE["userID"]);
$examID = htmlspecialchars($_COOKIE["takeExamID"]);
$ArrayAns = array();
$ArrayQid = array();
$ArrayQid = $_SESSION['QuestionIDArray'];

// $Score = $_POST['Score'];

$connect = mysqli_connect($hostname, $username, $password, $dbname);

$result2 = mysqli_query($connect, "SELECT * FROM `question` WHERE ExamID = $examID");

if ($result2) {
    $rowCount = mysqli_num_rows($result2);
    for ($j = 0; $j <= $rowCount - 1; $j++) {

        $asn = "Answer_" . $j;
        $Answer = $_POST[$asn];
        array_push($ArrayAns, $Answer);
        $Qid = $ArrayQid[$j];
 
        $date = date("Y-n-j");
        $time = date("h:i:s");

        $realAns = '';
        $realScore = 0;

        $query = "INSERT INTO `studentans`(`ID`, `StudentAnswer`, `QuestionID`, `SubTime`, `ExamID`, `StudentMark`) VALUES ($ID, '$Answer', $Qid, '$time', $examID, 0)";
        $result = mysqli_query($connect, $query);
        if ($result) {
            // echo "<h2>Your Answer Has Been Uploaded!!</h2>";
            $sql = mysqli_query($connect, "SELECT * FROM `question` WHERE QuestionID = $Qid");
            if ($sql) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $realAns = $row['Answer'];
                    $realScore = $row['Score'];
                }
                if ($Answer == $realAns) {
                    if (mysqli_query($connect, "UPDATE studentans SET `StudentMark` = $realScore WHERE QuestionID = $Qid AND ID = $ID")) {
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                    }
                }
                header("Location: /EIE4432-Group-Project/html/login.html");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }
        } else {
            echo 'Data Not Inserted';
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }
} else {
    echo "Error: " . $result2 . "<br>" . mysqli_error($connect);
}



mysqli_close($connect);
