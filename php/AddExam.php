<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lib";

    $ExamID = $_POST['ExamID'];
    $QuestionType = $_POST['QuestionType'];
    $Question = $_POST['Question'];

    $choiceA = $_POST['choiceA'];
    $choiceB = $_POST['choiceB'];
    $choiceC = $_POST['choiceC'];
    $choiceD = $_POST['choiceD'];

    $Answer = $_POST['Answer'];
    $Score = $_POST['Score'];

    $connect = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "INSERT INTO `question`(`ExamID`, `QuestionType`, `Question`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `Answer`, `Score`) 
    VALUES ('$ExamID', '$QuestionType', '$Question', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$Answer', '$Score')";



    $result = mysqli_query($connect, $query);
    if($result)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);



?>