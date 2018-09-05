function fnameChk() {
   var regInput = $("#fname").val();
   var status_msg1 = "Must not be blank";
   var status = "pass";
   status_msg1 = status_msg1.fontcolor("D83D5A");
     if (regInput =="") {
        $("#fname-status").html(status_msg1);
        status = "fail"
        return status
      } else {
        $("#fname-status").html("");
        status = "pass"
     }
} 

function chkBlank(theInput) {
   var regInput = $(theInput).val();
   var status_msg1 = "Must not be blank";
   var status = "pass";
   status_msg1 = status_msg1.fontcolor("D83D5A");
     if (regInput =="") {
        $("#status").html(status_msg1);
        status = "fail"
        return status
      } else {
        $("#status").html("");
        status = "pass"
     }
}

function lnameChk() {
   var regInput = $("#lname").val();
   var status_msg1 = "Must not be blank";
   status_msg1 = status_msg1.fontcolor("D83D5A");
     if (regInput =="") {
        $("#lname-status").html(status_msg1);
        return false
      } else {
        $("#lname-status").html("");
     }
}

function checkUserAvailability() {
    var input_username = $("#username").val();
    var input_username_msg1 = "Must be 5 charaters or more";
    input_username_msg1 = input_username_msg1.fontcolor("#D83D5A");

     if (input_username.length<5) {
        $("#user-availability-status").html(input_username_msg1);
        return false
      } else {
    jQuery.ajax({
    url: "check_availability.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
    },
    error:function (){}
    });
  }
}

function validateemail(xemail) {
       var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       return filter.test(xemail);
}

function checkPasswordMatch() {
    var password = $("#password1").val();
    var confirmPassword = $("#password2").val();
    var password_msg1 = "Must be 5 charaters or more";
    var password_msg2 = "Passwords do not Match";
    var password_msg3 = "Passwords Match";
    password_msg1 = password_msg1.fontcolor("#D83D5A");
    password_msg2 = password_msg2.fontcolor("#D83D5A");
    password_msg3 = password_msg3.fontcolor("green");

     if (password.length<5) {
        $("#password-status").html(password_msg1);
        return false
      }

        if (password != confirmPassword) {
            $("#password-status").html(password_msg2);
        }
        else {
            $("#password-status").html(password_msg3);
        }
}

// $(document).ready(function () {
//    $("#txtConfirmPassword").keyup(checkPasswordMatch);
// });

function checkEmailAvailability(email) {
        var val_holder;
        var email_error1 = "Can Not Be Empty";
        var email_error2 = "Email is Invalid";
        email_error1 = email_error1.fontcolor("#D83D5A");
        email_error2 = email_error2.fontcolor("#D83D5A");
        var email       = jQuery.trim($("form input[name='email']").val()); // email field
        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // reg ex email check
        if(email == "") {
            $("#email-availability-status").html(email_error1);
        val_holder = 1;
        }
        if(email != "") {
            if(!email_regex.test(email)){ // if invalid email
                $("#email-availability-status").html(email_error2);
                //$("span.email-availability-status").html("Your email is invalid.");
                val_holder = 1;
            }
        }
        if(val_holder == 1) {
            return false;
        }
        val_holder = 0;
/************** start: email exist function and etc. **************/
    jQuery.ajax({
    url: "check_availability.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
        $("#email-availability-status").html(data);
    },
    error:function (){}
    });
}


/************** end: email exist function and etc. **************/




// Function that validates email address through a regular expression.
function validateEmail(sEmail) {
    var filter = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
        if (filter.test(sEmail)) {
         return true;
        }
        else {
         return false;
    }
}

// Submit enable/disable functions
//

$(document).ready(function() {
  
$(function() {
    $('#sbtbtn').attr('disabled', 'disabled');
});
 
$('input[type=text],input[type=password]').keyup(function() {
   //var error = 0;     
   //var isfname;
   isfname = fnameChk("#fname");
   var input_username = $("#username").val();
    if (input_username.length > 4 &&
    //if ($('#username').val() !='' && $('#username').length>4 
     //   if (input_username.length<5) {
    //$('#email').val() != '' &&
      isfname == "pass"
    //$('#fname').val() != ''
    ){
    //$('#lname').val() != '' &&
    //$('#password1').val() != ''&&
    //$('#password2').val() != '') {
      
     $('#sbtbtn').removeAttr('disabled');
    } else {
        $('#sbtbtn').attr('disabled', 'disabled');
    }
});
    });

