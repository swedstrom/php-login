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
function checkEmailAvailability() {
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
