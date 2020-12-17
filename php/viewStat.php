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

            <p> In Exam ID: 1233</p>
                <br>
                <p>The Maximum Marks is: 50 marks The Minimnum Marks is: 20 Marks.</p>
                <br>
                <p> The median is: 30, and thhe average is 36.5</p>
                
                
                <p> In Exam ID: 3333</p>
                <br>
                <p>The Maximum Marks is: 60 marks The Minimnum Marks is: 20 Marks.</p>
                <br>
                <p> The median is: 45, and thhe average is 35.5</p>
            
                <p> In Exam ID: 3333</p>
                <br>
                <p>The Maximum Marks is: 30 marks The Minimnum Marks is: 0 Marks.</p>
                <br>
                <p> The median is: 15, and thhe average is 15</p>


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