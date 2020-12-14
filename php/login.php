<!DOCTYPE html>

<head>
    <title>User Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/EIE4432-Group-Project/js/function.js"></script>
</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Online examination system</h1>
        <p id="welcomMsg">Welcome! </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Online examination system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="EIE4432-Group-Project/html/login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/registration.html">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Exam</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container h-100 mt-3">
        <?php
        //Connect to SQL sever
        include "mysql-connect.php";
        $connect = mysqli_connect($server, $user, $pw, $db);

        if (!$connect) {
            die('Could not connect: ' . mysqli_error($connect));
        }

        //Get selected inputted values from the HTML page
        $ID = $_POST['UserID'];
        $pw = $_POST['pwd'];

        //Select inputted values to INSERT record by using SQL
        if ($role == "Teacher") {
            $course = $_POST['course'];

            $sql = "INSERT INTO user (`id`, `name`, `email`, `password`, `image`, `role`, `course`)
            VALUES ($ID, '$nickName', '$email', '$pw', '', '$role', '$course')";
        } else if ($role == "Student") {
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO user (`id`, `name`, `email`, `password`, `image`, `role`, `gender`, `birthday`)
            VALUES ($ID, '$nickName', '$email', '$pw', '', '$role', '$gender', '$birthday')";
        }

        //Show message when record is added successfully
        if (mysqli_query($connect, $sql)) {
            echo "<h3>A new user record is added successfully!</h3><br>";
        } else {
            $err = "Error: " . $sql . "<br>" . mysqli_error($connect);
            echo $err;
        }

        mysqli_close($connect);
        ?>

    </div>

    <div class="jumbotron text-center">
        <p></p>
    </div>

</body>

</html>