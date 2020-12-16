
<form action="/EIE4432-Group-Project/php/DoneExam.php" method="post">                        
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "lib";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT QuestionID, StartTime, EndTime, Question, choiceA, choiceB,choiceC, choiceD, Answer, Score FROM question";
$result = $conn->query($sql);

echo'Enter your Student ID Here
<input type="text" name="ID" Value=""> <br><br><br>';

if ($result->num_rows > 0) {

  // output data of each row
  while($row = $result->fetch_assoc()) {
      if($row["choiceA"] != null){
    echo "Question ID: ".$row["QuestionID"]."<br>Question: ".$row["Question"]."<br>";
    echo "  A: ".$row["choiceA"]."   <br>B: ".$row["choiceB"]."  <br> C: ". $row["choiceC"]."  <br> D: ".$row["choiceD"]."<br>";
                            echo'
                            
                            <select name="Answer" id="Answer">
                            <option selected hidden value="">Select Correct Ans</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            
                            <br><br><br>
                            ';
  } else {
    echo "Question ID: ".$row["QuestionID"]."<br>Question: ".$row["Question"]."<br>";
    echo "True or False?"."<br>";
    echo'
                            <select name="Answer" id="Answer">
                            <option selected hidden value="">Select Correct Ans</option>
                                <option value="T">TRUE</option>
                                <option value="F">FALSE</option>
                            </select>        
                          
                            <br><br><br>
                            ';

  }

}} else {
  echo "0 results";
}

$conn->close();
?>


<input type="submit" value="submit" name="submit">
</form>
