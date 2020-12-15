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

    <div class="container" style="margin-top:30px">
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
                $ID = htmlspecialchars($_COOKIE["userID"]);
                $pw = $_POST['pwd'];

                //print intval($ID);

                //Select all record to display by using SQL
                $userQuery = strval("UPDATE `user` SET `password` = '$pw' WHERE id = $ID");
                //$sql = strval($userQuery+intval($ID));

                $result = mysqli_query($connect, $userQuery);

                if (!$result) {
                    die("Could not successfully run query.");
                } else {
                    print "<h3>Password updated!</h3><br>";
                }

                mysqli_close($connect);
                ?>


            </div>
        </div>
    </div>

    <div class="jumbotron text-center ">
        <p></p>
    </div>

</body>

</html>