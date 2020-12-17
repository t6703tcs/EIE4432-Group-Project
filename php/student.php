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
                        <a class="nav-link" href="/EIE4432-Group-Project/html/enterExamID.html">View Exam Result</a>
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
                $examIDArray = array();
                $examDateArray = array();
                $examStartTimeArray = array();
                $examEndTimeTimeArray = array();

                if (!$result) {
                    die("Could not successfully run query.");
                }
                if (mysqli_num_rows($result) == 0) {
                    print "No records were found with query $userQuery";
                    print "<h1></h1>";
                } else {
                    $date = date("Y-n-j");
                    $time = date("h:i");

                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($temp != $row["ExamID"]) {
                            echo "Exam ID: " . $row["ExamID"] . " The Exam will be held on " . $row["ExamDate"] .
                                ".  From " . $row["StartTime"] . " to " . $row["EndTime"] . "<br><br>";
                            $temp = $row["ExamID"];
                            array_push($examDateArray, $row["ExamDate"]);
                            array_push($examStartTimeArray, $row["StartTime"]);
                            array_push($examEndTimeTimeArray, $row["EndTime"]);
                            array_push($examIDArray, $row["ExamID"]);
                        }
                    }

                    for ($j = 0; $j <= count($examDateArray) - 1; $j++) {
                        $date1 = DateTime::createFromFormat('h:i', strval($time));
                        $date2 = DateTime::createFromFormat('h:i', strval($examStartTimeArray[$j]));
                        $date3 = DateTime::createFromFormat('h:i', strval($examEndTimeTimeArray[$j]));

                        $examID = $examIDArray[$j];

                        if ($examDateArray[$j] == $date && $date1 > $date2 && $date1 < $date3) {
                            echo "Exam ID: ".$examID.", You may start now.<br>";
                            echo '<form action="showQuestion.php" method="post">
                                <input type="button" onclick="examGo(' . $examID . ');" value="Start">                    
                            </form>';
                        } else {
                            echo "Exam ID: ".$examID.", Not started Yet! please wait...<br>";
                        }
                    }
                }
                mysqli_close($connect);

                ?>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center">
        <p></p>
    </div>

</body>
<script type="text/JavaScript">
    function examGo(id) {
    var msg = "" + id;
    //alert(msg);
    createCookie("takeExamID", msg, 1);

    window.location.href = "/EIE4432-Group-Project/php/showQuestion.php";
}

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

</html>