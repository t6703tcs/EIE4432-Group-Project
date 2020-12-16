<?php

echo "<h2>Your Answer Has Been Uploaded!!</h2>";
echo "<h2>You can leave this page now</h2>";



    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lib";

    // $ExamID = $_POST['ExamID'];
    // $QuestionID = $_POST['QuestionID'];

    $Answer = $_POST['Answer'];
    $ID = $_POST['ID'];

    // $Score = $_POST['Score'];

    $connect = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "INSERT INTO `studentans`(`ID`, `QuestionID`, `Answer`) VALUES ($ID,[value-2],$Answer)";

    $result = mysqli_query($connect, $query);
    if($result)
    {
        return TRUE;
        echo 'Data Inserted';
    }
    
    else{
        return FALSE;
        echo 'Data Not Inserted';
    }

    mysqli_free_result($result);
    mysqli_close($connect);



?>

