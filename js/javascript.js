// for signuo_teacher

// to validate name
$("#name").change(function () {
    var cn = $("#name").val();

    if (cn.charAt(0) == ' ') {
        document.getElementById('message').style.visibility = "visible";
        document.getElementById('message').style.color = "RED";
        document.getElementById('message').innerHTML = "First character cannot have space";
    } else if (/[0-9]/.test(cn)) {
        document.getElementById('message').style.visibility = "visible";
        document.getElementById('message').style.color = "RED";
        document.getElementById('message').innerHTML = "Numbers are not allowed";
    } else if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(cn)) {
        document.getElementById('message').style.visibility = "visible";
        document.getElementById('message').style.color = "RED";
        document.getElementById('message').innerHTML = "Special characters are not allowed";
    } else {
        document.getElementById('message').style.visibility = "hidden";
    }
});
// TO validate email
$("#email").change(function () {
    var email = $("#email").val();
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (email.charAt(0) === ' ') {
        document.getElementById('message1').style.visibility = "visible";
        document.getElementById('message1').style.color = "RED";
        document.getElementById('message1').innerHTML = "First character can not have space";
    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 3 >= email.length) {
        document.getElementById('message1').style.visibility = "visible";
        document.getElementById('message1').style.color = "RED";
        document.getElementById('message1').innerHTML = "Email-ID is not valid";
    } else {
        document.getElementById('message1').style.visibility = "hidden";
    }
});
// To validate Enter Passowrd
$("#pwd").blur(function () {
    var np = $("#pwd").val(), num = new RegExp("[0-9]", "g"), spe = new RegExp("[!@#$%^&*()_+]");
    if (np.search(num) === -1) {
        document.getElementById('message2').style.visibility = "visible";
        document.getElementById('message2').style.color = "RED";
        document.getElementById('message2').innerHTML = "Enter at-least one numeric value";
    } else if (np.search(spe) === -1) {
        document.getElementById('message2').style.visibility = "visible";
        document.getElementById('message2').style.color = "RED";
        document.getElementById('message2').innerHTML = "Enter at-least one special character";
    } else if (np.match("password@123") || np.match("Password@123") || np.match("NewPassword@123")) {
        document.getElementById('message2').style.visibility = "visible";
        document.getElementById('message2').style.color = "RED";
        document.getElementById('message2').innerHTML = "Choose a difficult Password";
    } else {
        document.getElementById('message2').style.visibility = "hidden";
    }
});
// To validate Re-Enter Password
$("#rpwd").blur(function () {
    var cp = $("#pwd").val(), np = $("#rpwd").val();
    if (cp != np) {
        document.getElementById('message3').style.visibility = "visible";
        document.getElementById('message3').style.color = "RED";
        document.getElementById('message3').innerHTML = "Passwords do not Match";
    } else {
        document.getElementById('message3').style.visibility = "hidden";
    }
});
//To Validate all field is Valid
function validAllField() {

    var v = document.getElementById("message").style.visibility;
    var v1 = document.getElementById("message1").style.visibility;
    var v2 = document.getElementById("message2").style.visibility;
    var v3 = document.getElementById("message3").style.visibility;

    if (v == 'visible' || v1 == 'visible' || v2 == 'visible' || v3 == 'visible') {
        return false;
    }
}






// for signup_student

// to validate name 
$("#name1").change(function () {
    var cn = $("#name1").val();

    if (cn.charAt(0) == ' ') {
        document.getElementById('message4').style.visibility = "visible";
        document.getElementById('message4').style.color = "RED";
        document.getElementById('message4').innerHTML = "First character cannot have space";
    } else if (/[0-9]/.test(cn)) {
        document.getElementById('message4').style.visibility = "visible";
        document.getElementById('message4').style.color = "RED";
        document.getElementById('message4').innerHTML = "Numbers are not allowed";
    } else if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(cn)) {
        document.getElementById('message4').style.visibility = "visible";
        document.getElementById('message4').style.color = "RED";
        document.getElementById('message4').innerHTML = "Special characters are not allowed";
    } else {
        document.getElementById('message4').style.visibility = "hidden";
    }
});
// to valdate id
$("#roll").change(function () {
    var acc = $("#roll").val();

    if (acc != parseInt(acc)) {
        if (/[a-zA-Z]/.test(acc)) {
            document.getElementById('message5').style.visibility = "visible";
            document.getElementById('message5').style.color = "RED";
            document.getElementById('message5').innerHTML = "Characters are not allowed";
        } else {
            document.getElementById('message5').style.visibility = "visible";
            document.getElementById('message5').style.color = "RED";
            document.getElementById('message5').innerHTML = "Special characters are not allowed";
        }
    } else {
        document.getElementById('message5').style.visibility = "hidden";
    }
});
// to validate email
$("#email1").change(function () {
    var email = $("#email1").val();
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (email.charAt(0) === ' ') {
        document.getElementById('message6').style.visibility = "visible";
        document.getElementById('message6').style.color = "RED";
        document.getElementById('message6').innerHTML = "First character can not have space";
    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 3 >= email.length) {
        document.getElementById('message6').style.visibility = "visible";
        document.getElementById('message6').style.color = "RED";
        document.getElementById('message6').innerHTML = "Email-ID is not valid";
    } else {
        document.getElementById('message6').style.visibility = "hidden";
    }
});
// To validate Enter Passowrd
$("#pwd1").blur(function () {
    var np = $("#pwd1").val(), num = new RegExp("[0-9]", "g"), spe = new RegExp("[!@#$%^&*()_+]");
    if (np.search(num) === -1) {
        document.getElementById('message7').style.visibility = "visible";
        document.getElementById('message7').style.color = "RED";
        document.getElementById('message7').innerHTML = "Enter at-least one numeric value";
    } else if (np.search(spe) === -1) {
        document.getElementById('message7').style.visibility = "visible";
        document.getElementById('message7').style.color = "RED";
        document.getElementById('message7').innerHTML = "Enter at-least one special character";
    } else if (np.match("password@123") || np.match("Password@123") || np.match("NewPassword@123")) {
        document.getElementById('message7').style.visibility = "visible";
        document.getElementById('message7').style.color = "RED";
        document.getElementById('message7').innerHTML = "Choose a difficult Password";
    } else {
        document.getElementById('message7').style.visibility = "hidden";
    }
});
// To validate Re-Enter Password
$("#rpwd1").blur(function () {
    var cp = $("#pwd1").val(), np = $("#rpwd1").val();
    if (cp != np) {
        document.getElementById('message8').style.visibility = "visible";
        document.getElementById('message8').style.color = "RED";
        document.getElementById('message8').innerHTML = "Passwords do not Match";
    } else {
        document.getElementById('message8').style.visibility = "hidden";
    }
});
// to validate all field
function validAllField2() {

    var v = document.getElementById("message4").style.visibility;
    var v1 = document.getElementById("message5").style.visibility;
    var v2 = document.getElementById("message6").style.visibility;
    var v3 = document.getElementById("message7").style.visibility;
    var v4 = document.getElementById("message8").style.visibility;

    if (v == 'visible' || v1 == 'visible' || v2 == 'visible' || v3 == 'visible' || v4 == 'visible') {
        return false;
    }
}







// for signup_parent

// to validate name 
$("#name2").change(function () {
    var cn = $("#name2").val();

    if (cn.charAt(0) == ' ') {
        document.getElementById('message9').style.visibility = "visible";
        document.getElementById('message9').style.color = "RED";
        document.getElementById('message9').innerHTML = "First character cannot have space";
    } else if (/[0-9]/.test(cn)) {
        document.getElementById('message9').style.visibility = "visible";
        document.getElementById('message9').style.color = "RED";
        document.getElementById('message9').innerHTML = "Numbers are not allowed";
    } else if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(cn)) {
        document.getElementById('message9').style.visibility = "visible";
        document.getElementById('message9').style.color = "RED";
        document.getElementById('message9').innerHTML = "Special characters are not allowed";
    } else {
        document.getElementById('message9').style.visibility = "hidden";
    }
});
// TO validate email
$("#email2").change(function () {
    var email = $("#email2").val();
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (email.charAt(0) === ' ') {
        document.getElementById('message10').style.visibility = "visible";
        document.getElementById('message10').style.color = "RED";
        document.getElementById('message10').innerHTML = "First character can not have space";
    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 3 >= email.length) {
        document.getElementById('message10').style.visibility = "visible";
        document.getElementById('message10').style.color = "RED";
        document.getElementById('message10').innerHTML = "Email-ID is not valid";
    } else {
        document.getElementById('message10').style.visibility = "hidden";
    }
});
// TO validate email
$("#email22").change(function () {
    var email = $("#email22").val();
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (email.charAt(0) === ' ') {
        document.getElementById('message11').style.visibility = "visible";
        document.getElementById('message11').style.color = "RED";
        document.getElementById('message11').innerHTML = "First character can not have space";
    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 3 >= email.length) {
        document.getElementById('message11').style.visibility = "visible";
        document.getElementById('message11').style.color = "RED";
        document.getElementById('message11').innerHTML = "Email-ID is not valid";
    } else {
        document.getElementById('message11').style.visibility = "hidden";
    }
});
// To validate Enter Passowrd
$("#pwd2").blur(function () {
    var np = $("#pwd2").val(), num = new RegExp("[0-9]", "g"), spe = new RegExp("[!@#$%^&*()_+]");
    if (np.search(num) === -1) {
        document.getElementById('message12').style.visibility = "visible";
        document.getElementById('message12').style.color = "RED";
        document.getElementById('message12').innerHTML = "Enter at-least one numeric value";
    } else if (np.search(spe) === -1) {
        document.getElementById('message12').style.visibility = "visible";
        document.getElementById('message12').style.color = "RED";
        document.getElementById('message12').innerHTML = "Enter at-least one special character";
    } else if (np.match("password@123") || np.match("Password@123") || np.match("NewPassword@123")) {
        document.getElementById('message12').style.visibility = "visible";
        document.getElementById('message12').style.color = "RED";
        document.getElementById('message12').innerHTML = "Choose a difficult Password";
    } else {
        document.getElementById('message12').style.visibility = "hidden";
    }
});
// To validate Re-Enter Password
$("#rpwd2").blur(function () {
    var cp = $("#pwd2").val(), np = $("#rpwd2").val();
    if (cp != np) {
        document.getElementById('message13').style.visibility = "visible";
        document.getElementById('message13').style.color = "RED";
        document.getElementById('message13').innerHTML = "Passwords do not Match";
    } else {
        document.getElementById('message13').style.visibility = "hidden";
    }
});
// to validate all field
function validAllField3() {

    var v = document.getElementById("message9").style.visibility;
    var v1 = document.getElementById("message10").style.visibility;
    var v2 = document.getElementById("message11").style.visibility;
    var v3 = document.getElementById("message12").style.visibility;
    var v4 = document.getElementById("message13").style.visibility;

    if (v == 'visible' || v1 == 'visible' || v2 == 'visible' || v3 == 'visible' || v4 == 'visible') {
        return false;
    }
}










// add semester option
$("#branch").change(function () {
    var listvalue = document.getElementById('branch').value;

    sem.innerHTML = "";
    if (listvalue == "MCA") {
        var optionArray = ["|SELECT SEMESTER : ", "I|I", "II|II", "III|III", "IV|IV", "V|V"];
    } else {
        var optionArray = ["|SELECT SEMESTER : ", "I|I", "II|II", "III|III", "IV|IV", "V|V", "VI|VI", "VII|VII", "VIII|VII"];
    }

    for (option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        sem.options.add(newOption);
    }
});


$("#sem").change(function () {
    var b = $("#branch").val();
    var s = $("#sem").val();
    $.ajax({
        type: "POST",
        url: "get_subjects.php",
        data: {b: b, s: s},
        success: function (result) {
            $("#subcode").html(result);
        },
        dataType: 'text'
    });
});

