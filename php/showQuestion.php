<?php
// Start the session
session_start();
$QuestionIDArray = array();
?>

<!DOCTYPE html>

<head>
    <title>Change password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/EIE4432-Group-Project/js/function.js"></script>
    <script src="/EIE4432-Group-Project/js/cookie.js"></script>

</head>

<body>
    <div class="jumbotron text-center " style="margin-bottom:0 ">
        <h1>Online examination system</h1>
        <p id="welcomMsg ">Welcome! </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <a class="navbar-brand " href="# ">Online examination system</a>
        <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#collapsibleNavbar ">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse " id="collapsibleNavbar ">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link " href="login.html ">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="registration.html ">Registration</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mb-5" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <h3>Functions</h3>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/EIE4432-Group-Project/html/login.html">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/EIE4432-Group-Project/html/login.html" onclick="clearCookie();">Log Out</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">


                <form class="text-center" action="/EIE4432-Group-Project/php/DoneExam.php" method="post">
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

                    $examID = htmlspecialchars($_COOKIE["takeExamID"]);

                    $sql = "SELECT QuestionID, StartTime, EndTime, Question, choiceA, choiceB,choiceC, choiceD, Answer, Score FROM question WHERE ExamID = $examID";
                    $result = $conn->query($sql);

                    // echo 'Enter your Student ID Here
                    // <input type="text" name="ID" Value=""> <br><br><br>';

                    if ($result->num_rows > 0) {
                        $i = 0;
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            if ($row["choiceA"] != null) {
                                echo "<h4>Question ID: " . $row["QuestionID"] . "</h4><h3>Question: " . $row["Question"] . "</h3>";
                                echo "  A: " . $row["choiceA"] . "   <br>B: " . $row["choiceB"] . "  <br> C: " . $row["choiceC"] . "  <br> D: " . $row["choiceD"] . "<br>";

                                echo '
                            <select name="Answer_' . $i . '" id="Answer_' . $i . '">
                            <option selected hidden value="">Select Correct Ans</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            
                            <br><br><br>
                            ';
                            $qid = $row["QuestionID"];
                            array_push($QuestionIDArray, $qid);
                            } else {
                                echo "<h4>Question ID: " . $row["QuestionID"] . "</h4><h3>Question: " . $row["Question"] . "</h3>";
                                echo "True or False?" . "<br>";
                                echo '
                            <select name="Answer_' . $i . '" id="Answer_' . $i . '">
                            <option selected hidden value="">Select Correct Ans</option>
                                <option value="T">TRUE</option>
                                <option value="F">FALSE</option>
                            </select>        
                          
                            <br><br><br>
                            ';
                            $qid = $row["QuestionID"];
                            array_push($QuestionIDArray, $qid);
                            }
                            $i++;
                        }
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                    $_SESSION['QuestionIDArray'] = $QuestionIDArray;
                    ?>

                    <input class="btn btn-primary mt-3" type="submit" value="Submit" name="submit">
                </form>


            </div>
        </div>
    </div>

    <div class="jumbotron text-center ">
        <p></p>
    </div>

</body>

</html>