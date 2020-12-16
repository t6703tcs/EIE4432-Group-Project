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
                <h2>About Me</h2>
                <h5>Photo of me:</h5>
                <div>

                    <?php
                    include "mysql-connect.php";
                    $connect = mysqli_connect($server, $user, $pw, $db);

                    if (!$connect) {
                        die('Could not connect: ' . mysqli_error($connect));
                    }

                    $id = htmlspecialchars($_COOKIE["userID"]);

                    $sql = strval("SELECT * FROM `image` WHERE id = $id");
                    $result = mysqli_query($connect, $sql);

                    $row = mysqli_fetch_array($result);
                    echo '<img class="img-fluid img-thumbnail" src="' . $row['imagePath'] . '" alt="Profile image">';

                    mysqli_close($connect);
                    ?>

                </div>
                <h3>Functions</h3>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Take Exam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/EIE4432-Group-Project/html/changePassword.html">Change password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/EIE4432-Group-Project/html/login.html" onclick="clearCookie();">Log Out</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                
                <?php
                date_default_timezone_set("Asia/Hong_Kong");
                echo "<h2>The Exam will become avaliable once it's the Starting Time of the Exam</h3>";

                include "mysql-connect.php";
                $connect = mysqli_connect($server, $user, $pw, $db);

                if (!$connect) {
                    die('Could not connect: ' . mysqli_error($connect));
                }

                //Select all record to display by using SQL
                $userQuery = strval("SELECT * FROM `question`");
                //$sql = strval($userQuery+intval($ID));

                $result = mysqli_query($connect, $userQuery);
                $count = mysqli_num_rows($result);

                $temp = "";
                $examDateArray = array();

                if (!$result) {
                    die("Could not successfully run query.");
                }
                if (mysqli_num_rows($result) == 0) {
                    print "No records were found with query $userQuery";
                    print "<h1></h1>";
                } else {
                    $i = 0;
                    $date = date("Y-n-j");
                    $time = date("h:i");
                    $int_date = intval($date);
                    $int_time =  intval($time);
                    // print "<p>There are <a id='idCount'>" . $count . "</a> users as follows: </p>";
                    // print "<table class='table table-hover text-center'><form>";
                    // print "<tr><th> ID </th><th> Name </th><th> Password </th><th> Role </th><th> Gender </th><th> Birthday </th><th> Course </th><th> Email </th><th> </th><th>  </th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        // $selectedID = $row['id'];
                        // print "<tr><td id='Id_$i'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['password'] . "</td><td>" . $row['role'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['birthday'] . "</td><td>" .
                        //     $row['course'] . "</td><td>" . $row['email'] . "</td><td>  <button type='button' class='btn btn-info' value='$selectedID' onclick=" . "enableEdit();editInfo('" . $selectedID . "')" . ">Edit</button> </td></tr>";
                        if ($temp != $row["ExamID"]) {
                            echo "Exam ID: " . $row["ExamID"] . " The Exam will be held on " . $row["ExamDate"] .
                                ".  From " . $row["StartTime"] . " to " . $row["EndTime"] . "<br><br>";
                            $temp = $row["ExamID"];
                            array_push($examDateArray, $row["ExamDate"]);
                            $i++;
                        }                        
                        
                    }

                    for ($j=0;$j<=count($examDateArray)-1;$j++){
                        if ($examDateArray[$j]==$date) {
                            echo $examDateArray[1];
                        } else {
                            echo "Not Yet! please wait...<br>";
                        }
                    }
                    

                    // print "</form></table>";
                }
                mysqli_close($connect);

                // $sql = "SELECT ExamID, ExamDate, StartTime, EndTime FROM question";
                // $result = $conn->query($sql);
                // $temp = "";
                // $date = "";
                // $time = "";
                // $ExamDate = "SELECT ExamDate FROM question WHERE ExamDate=";
                // $Date = mysqli_query($conn, $ExamDate);
                // $test = "";
                // $Array = array();
                // $Questions = "SELECT QestionID, Question, choiceA, choiceB, choiceD, Answer, Score FROM question";

                // date_default_timezone_set("Asia/Hong_Kong");

                // if (mysqli_num_rows($result) > 0) {
                //     while ($row = mysqli_fetch_assoc($result)) {

                //         if ($temp != $row["ExamID"]) {
                //             echo "Exam ID: " . $row["ExamID"] . " The Exam will be held on " . $row["ExamDate"] .
                //                 ".  From " . $row["StartTime"] . " to " . $row["EndTime"] . "<br><br>";
                //             $temp = $row["ExamID"];
                //             array_push($Array, $row["ExamDate"]);
                //         }
                //     }
                //     for ($i = 0; $i <= count($Array); $i++) {

                        // $row = mysqli_fetch_assoc($result);
                        // $date = date("Y-n-j");
                        // $time = date("h:i");
                        // $int_date = intval($date);
                        // $int_time =  intval($time);

                        // if($int_date != $Array[0]){
                        //     echo"You can start the exam ".@$row["ExamID"]." now.";
                        //     echo '<form action="showQuestion.php" method="post">

                //         //         <input type="submit" onclick="openExam()" value="Start" name="Start">

                //         //         </form>
                //         //         ';
                //         //     }
                //     }
                //     if ($int_date == $Array[0]) {
                //         echo "You can start the exam now.";
                //         echo '<form action="showQuestion.php" method="post">

                //             <input type="submit" onclick="openExam()" value="Start" name="Start">

                //             </form>
                //             ';
                //     }
                // }


                // mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center">
        <p></p>
    </div>

</body>

</html>