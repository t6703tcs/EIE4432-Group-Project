<?php

echo "<h2>The Exam will become avaliable once it's the Starting Time of the Exam</h3>";

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
$date = "";
$time = "";
$ExamDate = "SELECT ExamDate FROM question WHERE ExamDate=";
$Date = mysqli_query($conn, $ExamDate);
$test = "";
$Array = array();
$Questions = "SELECT QestionID, Question, choiceA, choiceB, choiceD, Answer, Score FROM question";

date_default_timezone_set("Asia/Hong_Kong");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        if ($temp != $row["ExamID"]) {
            echo "Exam ID: " . $row["ExamID"] . " The Exam will be held on " . $row["ExamDate"] .
                ".  From " . $row["StartTime"] . " to " . $row["EndTime"] . "<br><br>";
            $temp = $row["ExamID"];
            array_push($Array, $row["ExamDate"]);
        }
    }
    for ($i = 0; $i <= count($Array); $i++) {

        $row = mysqli_fetch_assoc($result);
        $date = date("Y-n-j");
        $time = date("h:i");
        $int_date = intval($date);
        $int_time =  intval($time);

    }
    if ($int_date == $Array[0]) {
        echo "You can start the exam now.";
        echo '<form action="showQuestion.php" method="post">
    
            <input type="submit" onclick="openExam()" value="Start" name="Start">
                    
           </form>';
    }
}


mysqli_close($conn);
?>

<script type="text/JavaScript">


    function openExam(){
    var frag = document.createDocumentFragment(),
        temp = document.createElement('div');
    temp.innerHTML = htmlStr;
    while (temp.firstChild) {
        frag.appendChild(temp.firstChild);
    }
    return frag;
}

var fragment = create('<div>Hello!</div><p>...</p>');
// You can use native DOM methods to insert the fragment:
document.body.insertBefore(fragment, document.body.childNodes[0]);
</script>