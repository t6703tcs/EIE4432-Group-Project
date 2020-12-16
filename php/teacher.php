<!DOCTYPE html>

<head>
    <title>Online examination system - Teacher</title>
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
        <p id="welcomMsg">Welcome! Teacher.</p>
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

    <!-- <div class="container h-100 mt-3">
        <h2>Please Login:</h2>
        <div class="row h-100 justify-content-center align-items-center">
            <form class="col-12" method="post" action="/EIE4432-Group-Project/php/login.php" id="form_content">
                <div class="form-group">
                    <label for="text">User ID:</label>
                    <input type="text" class="form-control " placeholder="Enter User ID" id="UserID" name="UserID">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
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
                    echo '<img class="img-fluid img-thumbnail" src="'.$row['imagePath'].'" alt="Profile image">';
                    
                    mysqli_close($connect);
                    ?>      
                </div>
                <h3>Functions</h3>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/EIE4432-Group-Project/php/createExamPage.php">Create Exam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">View Exam Result</a>
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
                <h2>Please select function on your left.</h2>
                <h5>Your User ID is: <?php echo htmlspecialchars($_COOKIE["userID"]);?></h5>
                <p>You can click 'Create Exam' to schedule and add questions for an exam. <br>You can also click 'View Exam Result' to evaluates and views students' submitted answers. <br>If you want to reset password, you can click 'Change Password'! </p>

            </div>
        </div>
    </div>

    <div class="jumbotron text-center">
        <p></p>
    </div>

</body>

</html>