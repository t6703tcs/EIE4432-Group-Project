<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lib";

    $ExamID = $_POST['ExamID'];
    $QuestionID = $_POST['QuestionID'];

    $ExamDate = $_POST['ExamDate'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];
    $Question = $_POST['Question'];


    $choiceA = @$_POST['choiceA'];
    $choiceB = @$_POST['choiceB'];
    $choiceC = @$_POST['choiceC'];
    $choiceD = @$_POST['choiceD'];

    $Answer = $_POST['Answer'];
    $Score = $_POST['Score'];

    $connect = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "INSERT INTO `question`( `ExamDate`, `StartTime`, `EndTime`, `ExamID`, `QuestionID`, `Question`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `Answer`, `Score`) 
                VALUES ('$ExamDate', '$StartTime', '$EndTime', '$ExamID', '$QuestionID', '$Question' , '$choiceA',  '$choiceB', '$choiceC', '$choiceD', '$Answer', '$Score')";



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

