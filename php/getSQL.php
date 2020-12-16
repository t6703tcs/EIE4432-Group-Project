    <?php
    include "mysql-connect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);

    if (!$connect) {
        die('Could not connect: ' . mysqli_error($connect));
    }

    $sql = strval("SELECT * FROM `user`");
    $result = mysqli_query($connect, $sql);

    //Create dropdown list
    echo "<option selected disabled hidden></option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option>" . $row['id'] . "</option>";
    }
    mysqli_close($connect);
    ?>
