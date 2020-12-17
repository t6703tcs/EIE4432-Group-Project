<!DOCTYPE html>

<head>
    <title>Online examination system - Student</title>
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

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Online examination system</h1>
        <p id="welcomMsg">Welcome! Student</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Online examination system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/registration.html">Registration</a>
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

                <?php
                //Connect to SQL sever
                include "mysql-connect.php";
                $connect = mysqli_connect($server, $user, $pw, $db);

                if (!$connect) {
                    die('Could not connect: ' . mysqli_error($connect));
                }

                //Get selected inputted values from the HTML page
                //$ID = strval($_POST['UserID']);
                $ExamID = $_POST['ExamID'];
                $role = htmlspecialchars($_COOKIE["role"]);

                if ($role == "Teacher") {
                    $ID = $_POST['UserID'];
                } else {
                    $ID = htmlspecialchars($_COOKIE["userID"]);
                }

                //Select all record to display by using SQL
                $userQuery = strval("SELECT * FROM `studentans` WHERE ExamID = $ExamID AND ID = $ID");
                $result = mysqli_query($connect, $userQuery);
                //$result2 = mysqli_query($connect, $sql);

                $stnanswerArray = array();
                $stnScrArray = array();
                $examTotArray = array();

                $submittedDate = '';
                $submittedTime = '';

                if (!$result) {
                    die("Could not successfully run query.");
                }
                if (mysqli_num_rows($result) == 0) {
                    print "No records were found with query $userQuery";
                } else {
                    // $i = 0;
                    // print "<table class='table table-hover text-center'><form>";
                    // print "<tr><th> Questions </th><th> Submitted answers </th><th> Correct answers </th><th> Score per question </th><th> Submitted time </th></tr>";
                    // while ($row = mysqli_fetch_assoc($result)) {
                    //     $selectedID = $row['id'];
                    //     print "<tr><td id='Id_$i'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['password'] . "</td><td>" . $row['role'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['birthday'] . "</td><td>" .
                    //         $row['course'] . "</td><td>" . $row['email'] . "</td><td>  <button type='button' class='btn btn-info' onclick=" . "enableEdit();editInfo('" . $selectedID . "')" . ">Edit</button> </td></tr>";
                    //     $i++;
                    // }
                    // print "</form></table>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        array_push($stnanswerArray, $row['StudentAnswer']);
                        array_push($stnScrArray, $row['StudentMark']);
                        $submittedTime = $row['SubTime'];
                        //array_push($stnanswerArray, $row['StudentAnswer']);
                    }
                }


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

                $sql = "SELECT * FROM question WHERE ExamID = $ExamID";
                $result = $conn->query($sql);

                // echo 'Enter your Student ID Here
                // <input type="text" name="ID" Value=""> <br><br><br>';

                if ($result->num_rows > 0) {
                    $i = 0;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $submittedDate = $row["ExamDate"];

                        if ($row["choiceA"] != null) {
                            echo "<h5>Question ID: " . $row["QuestionID"] . "</h5><h3>Question: " . $row["Question"] . "</h3>";
                            echo "  A: " . $row["choiceA"] . "   <br>B: " . $row["choiceB"] . "  <br> C: " . $row["choiceC"] . "  <br> D: " . $row["choiceD"] . "<br>";

                            echo '<br>Question Score: ' . $row["Score"]  . '<br>';
                            echo 'Student Score: ' . $stnScrArray[$i] . '<br><br>';
                            echo 'Correct Answer: ' . $row["Answer"] . '<br>';
                            echo 'Student Answer: ' . $stnanswerArray[$i] . '<br><br><br>';

                            $Score = $row["Score"];
                            array_push($examTotArray, $Score);
                        } else {
                            echo "<h5>Question ID: " . $row["QuestionID"] . "</h5><h3>Question: " . $row["Question"] . "</h3>";
                            echo "True or False?" . "<br>";

                            echo '<br>Question Score: ' . $row["Score"]  . '<br>';
                            echo 'Student Score: ' . $stnScrArray[$i] . '<br><br>';
                            echo 'Correct Answer: ' . $row["Answer"]  . '<br>';
                            echo 'Student Answer: ' . $stnanswerArray[$i] . '<br><br><br>';

                            $Score = $row["Score"];
                            array_push($examTotArray, $Score);
                        }

                        $i++;
                    }
                    echo 'Exam total score: ' . array_sum($examTotArray) . '<br><br>';
                    echo 'Student total score: ' . array_sum($stnScrArray) . '<br><br>';
                    echo 'Submitted time: ' . $submittedDate . ', ' . $submittedTime;
                } else {
                    echo "0 results";
                }

                $conn->close();

                mysqli_close($connect);

                ?>

            </div>

        </div>
    </div>
    </div>

    <div class="jumbotron text-center">
        <p></p>
    </div>

</body>
<script type="text/JavaScript">
    function examGo(id) { var msg = "" + id; //alert(msg); createCookie("takeExamID", msg, 1); window.location.href = "/EIE4432-Group-Project/php/showQuestion.php"; } function openExam(){ var frag = document.createDocumentFragment(), temp = document.createElement('div');
    temp.innerHTML = htmlStr; while (temp.firstChild) { frag.appendChild(temp.firstChild); } return frag; } var fragment = create('
    <div>Hello!</div>
    <p>...</p>'); // You can use native DOM methods to insert the fragment: document.body.insertBefore(fragment, document.body.childNodes[0]);
</script>

</html>