<?php





$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "lib";
$ArrayAns = array();

// $ExamID = $_POST['ExamID'];
// $QuestionID = $_POST['QuestionID'];

$Answer = $_POST['Answer'];
$ID = htmlspecialchars($_COOKIE["userID"]);
echo $ID;
echo $Answer;
// $Score = $_POST['Score'];

$connect = mysqli_connect($hostname, $username, $password, $dbname);
$query = "INSERT INTO `studentans`(`ID`,  `Answer`) VALUES ($ID,$Answer)";

$result = mysqli_query($connect, $query);

if ($result) {

    return TRUE;
    echo "<h2>Your Answer Has Been Uploaded!!</h2>";
    echo "<h2>You can leave this page now</h2>";

    for ($j = 0; $j <= $i; $j++) {

        echo '<script type="text/JavaScript"> 
            $Answer = document.getElementById(Answer_' . $i . ');
        </script> ';
        array_push($ArrayAns, $Answer);
    }
} else {
    return FALSE;
    echo 'Data Not Inserted';
}

mysqli_free_result($result);
mysqli_close($connect);
?>
