function checkRoles() {
    var roles = document.getElementById("Select_S_T");
    var roles_content = roles.options[roles.selectedIndex].text;

    if (roles_content == "Student") {
        // document.getElementById("course_hide_show").style.visibility = "hidden";
        // document.getElementById("birthday_hide_show").style.visibility = "visible";
        // document.getElementById("gender_hide_show").style.visibility = "visible";
        document.getElementById("course").disabled = true;;
        document.getElementById("birthday").disabled = false;;
        document.getElementById("gender").disabled = false;;

    } else if (roles_content == "Teacher") {
        // document.getElementById("birthday_hide_show").style.visibility = "hidden";
        // document.getElementById("gender_hide_show").style.visibility = "hidden";
        // document.getElementById("course_hide_show").style.visibility = "visible";

        document.getElementById("course").disabled = false;;
        document.getElementById("birthday").disabled = true;;
        document.getElementById("gender").disabled = true;;
    }
}

function checkInfo() {
    document.getElementById("warningBox").hidden = true;
    document.getElementById("inputBox").hidden = true;
    document.getElementById("roleBox").hidden = true;

    var roles = document.getElementById("Select_S_T");
    var roles_content = roles.options[roles.selectedIndex].text;
    var id = document.getElementById("UserID").value;
    var password = document.getElementById("pwd").value;
    var Name = document.getElementById("nickName").value;
    var gender = document.getElementById("gender");
    var gender_content = gender.options[gender.selectedIndex].text;
    var email = document.getElementById("email").value;
    var birthday = document.getElementById("birthday").value;
    var course = document.getElementById("course");
    var course_content = course.options[course.selectedIndex].text;
    var emCheck = new Boolean;

    // Check email
    reg = /^[^\s]+@[^\s]+\.[^\s]{2,3}$/;
    if (reg.test(email)) {
        emCheck = true;
    } else {
        emCheck = false;
    }

    // Case for Student
    if (roles_content == "Student") {

        if (id.length <= 0 || password.length <= 0 || Name.length <= 0 || gender_content.length <= 0 || email.length <= 0 || birthday <= 0) {
            document.getElementById("warningBox").hidden = false;
        } else {
            if (isNaN(id) || emCheck == false) {
                document.getElementById("inputBox").hidden = false;
            } else {
                document.getElementById("form_content").submit();
            }
        }
        // Case for Teacher
    } else if (roles_content == "Teacher") {
        if (id.length <= 0 || password.length <= 0 || Name.length <= 0 || email.length <= 0 || course_content.length <= 0) {
            document.getElementById("warningBox").hidden = false;
        } else {
            if (isNaN(id) || emCheck == false) {
                document.getElementById("inputBox").hidden = false;
            } else {
                document.getElementById("form_content").submit();
            }
        }
    } else {
        document.getElementById("roleBox").hidden = false;
    }

}

function enableDelete() {
    document.getElementById("deleteBox").hidden = false;
}

function enableInsert() {
    document.getElementById("insertBox").hidden = false;
}

function editInfo(id) {
    var msg = "" + id;
    //alert(msg);
    createCookie("editID", msg, 0.05);
}

function enableEdit() {
    //document.getElementById("modifyBox").hidden = false;
    window.location.href = "/EIE4432-Group-Project/php/edit.php";
}

function storeExamInfo() {
    var ExamID = document.getElementById("ExamID").value;
    var ExamDate = document.getElementById("ExamDate").value;
    var StartTime = document.getElementById("StartTime").value;
    var EndTime = document.getElementById("EndTime").value;

    createCookie("ExamID", ExamID, 1);
    createCookie("ExamDate", ExamDate, 1);
    createCookie("StartTime", StartTime, 1);
    createCookie("EndTime", EndTime, 1);

    //document.getElementById("modifyBox").hidden = false;
    window.location.href = "/EIE4432-Group-Project/php/addQuestion.php";
}

function examGo(id) {
    var msg = "" + id;
    //alert(msg);
    createCookie("takeExamID", msg, 1);

    window.location.href = "/EIE4432-Group-Project/php/showQuestion.php";
}