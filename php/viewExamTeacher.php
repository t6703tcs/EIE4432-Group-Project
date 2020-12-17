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
                    <a class="nav-link " href="/EIE4432-Group-Project/html/login.html ">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="/EIE4432-Group-Project/html/registration.html ">Registration</a>
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
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "lib";

                // Create connection
                $conn = new mysqli($hostname, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM studentans INNER JOIN question ON studentans.QuestionID = question.QuestionID";
                $result = $conn->query($sql);
                ?>
                <table border='1' id="Examdata" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Exam ID</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Submittion Time</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>


                    <?php
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selectedID = $row['ID'];
                            echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['ExamID'] . "</td><td>" . $row['StudentMark'] .
                                "</td><td>" . $row['SubTime'] . "</td></tr>";
                        }
                    ?>


                </table>

            <?php
                    } else {
                        echo "No Record Found";
                    }

                    mysqli_close($conn);
            ?>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center ">
        <p></p>
    </div>

</body>

</html>