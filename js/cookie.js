function createCookie(fieldname, fieldvalue, expiry) {
    var date = new Date();
    date.setTime(date.getTime() + (expiry * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toGMTString();
    document.cookie = fieldname + "=" + fieldvalue +
        ";" + expires + ";path=/";

}


function readCookie(cname) {
    var name = cname + "=";
    var decoded_cookie =
        decodeURIComponent(document.cookie);
    var carr = decoded_cookie.split(';');
    for (var i = 0; i < carr.length; i++) {
        var c = carr[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function runApp() {
    var user = readCookie("userID");
    var role = readCookie("role");
    if (user != "" && role == "Student") {
        window.location.href = "/EIE4432-Group-Project/php/student.php";
    } else if (user != "" && role == "Teacher") {
        window.location.href = "/EIE4432-Group-Project/php/teacher.php";
        // user = prompt("Enter your name: ", "");
        // if (user != "" && user != null) {
        //     createCookie("username", user, 30);
        // }
    }
}

function clearCookie() {
    // var cookies = document.cookie.split(";");

    // for (var i = 0; i < cookies.length; i++) {
    //     var cookie = cookies[i];
    //     var eqPos = cookie.indexOf("=");
    //     var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    //     document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    // }
    document.cookie = "userID=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "role=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}