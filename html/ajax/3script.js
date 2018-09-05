function checkUserAvailability() {
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
function validateemail(xemail) {
       var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       return filter.test(xemail);
}

function checkEmailAvailability() {
        var xemail=$("#email").val();
        var $result = $("#xemail-availability-status");
        // var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $result.txt("");

        // var filter=/^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
        //if (filter.test(email)==false) {
        if (validateemail(xemail)) {
           //alert("The Email is not a valid format");
           $result.txt(xemail + " is good");
           $result.css("color", "green");
        } else {
           $result.txt(xemail + " is bad");
           $result.css("color", "red");
//document.getElementById("email-availability-status").innerHTML = checkEmailAvailability();
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
}

document.getElementById("email-availability-status").innerHTML = checkEmailAvailability();

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
