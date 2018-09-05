<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';
	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		
		$pass1 = trim($_POST['pass1']);
		$pass1 = strip_tags($pass1);
		$pass1 = htmlspecialchars($pass1);
		

		//basic email validation
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
                        $query = "SELECT email FROM users WHERE email='$email'";
                        $result = mysqli_query($conn,$query);
                        $count = mysqli_num_rows($result);
                        if($count==0){
                                $error = true;
                                $emailError = "Email or Password is Incorrect";
                                $emailpass1 = "Email or Password is Incorrect";
                        }
		// password validation
		if (empty($pass1)){
			$error = true;
			$pass1Error = "Please enter password.";
		}


		
		// password encrypt using SHA256();
		//$password = hash('sha256', $pass);
		  $password = $pass1;
		
		// if there's no error, continue to login
		if( !$error ) {
			
			$query = "SELECT password,id,email FROM users WHERE email='$email'";
                        $result = mysqli_query($conn,$query);
   			$count = mysqli_num_rows($result);
			if($count==0){
				$error = true;
				$emailError = "Email or Password is Incorrect";
				$emailpass1 = "Email or Password is Incorrect";
			}

			//$res = mysqli_query($conn, $query);
                        if ($conn->query($query) === TRUE) {
                                $errTyp = "success";
                                $errMSG = "Successfully Logged In";
                                unset($email);
                                unset($pass1);
				echo "Successfully Logged In";
			} else {
			        echo "Error: " . $query . "<br>" . $conn->error;
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}$conn->close();

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  /> 
<link rel="stylesheet" href="style.css" type="text/css" /> 
</head>
<body>

<script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#email").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_email_ajax(email);
        }, 1000);
    }); 

function check_email_ajax(email){
    $("#user-result").html('<img src="ajax-loader.gif" />');
    $.post('emailchk.php', {'email':email}, function(data) {
      $("#user-result").html(data);
    });
}
});
</script>


<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Login</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="email" maxlength="40"> <span id="user-result"</span> 
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass1" class="form-control" placeholder="Enter Password" maxlength="15"  id="myInput" />
                </div>
                <span class="text-danger"><?php echo $pass1Error; ?></span>

                <!-- An element to toggle between password visibility -->
                <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Login</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">home</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
