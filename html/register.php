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
		$fname = trim($_POST['fname']);
		$fname = strip_tags($fname);
		$fname = htmlspecialchars($fname);
		
		$lname = trim($_POST['lname']);
		$lname = strip_tags($lname);
		$lname = htmlspecialchars($lname);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		
		$pass1 = trim($_POST['pass1']);
		$pass1 = strip_tags($pass1);
		$pass1 = htmlspecialchars($pass1);

		$pass2 = trim($_POST['pass2']);
		$pass2 = strip_tags($pass2);
		$pass2 = htmlspecialchars($pass2);
		
		// basic fname validation
		if (empty($fname)) {
			$error = true;
			$fnameError = "Please enter your full name.";
		} else if (strlen($fname) < 3) {
			$error = true;
			$fnameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
			$error = true;
			$fnameError = "First Name must contain alph characters only.";
		}
		
		// basic lname validation
		if (empty($lname)) {
			$error = true;
			$lnameError = "Please enter your full name.";
		} else if (strlen($lname) < 3) {
			$error = true;
			$lnameError = "Last Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
			$error = true;
			$lnameError = "Last Name must contain alph characters only.";
		}
		
		//basic email validation
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT email FROM users WHERE email='$email'";
			$result = mysqli_query($conn,$query);
			//$result = mysql_query($query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		//	printf("There are %u million bicycles in %s.",$number,$str);

		}
		// password validation
		if (empty($pass2)){
			$error = true;
			$pass2Error = "Please enter password.";
		} else if(strlen($pass1) < 6) {
			$error = true;
			$pass1Error = "Password must have atleast 6 characters.";
                } else if(empty($pass1)){
			$error = true;
			$pass1Error = "Please enter password.";
                        
		} else
                if ( $pass1 <> $pass2 ){
	           $error = true;
		   $pass1Error = "Passwords are not matching.";
		}

		
		// password encrypt using SHA256();
		//$password = hash('sha256', $pass);
		  $password = $pass1;
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(fname,lname,email,password) VALUES('$fname','$lname','$email','$password')";
			//$res = mysqli_query($conn, $query);
                        if ($conn->query($query) === TRUE) {
                                $errTyp = "success";
                                $errMSG = "Successfully registered, you may login now";
                                unset($fname);
                                unset($lname);
                                unset($email);
                                unset($pass1);
                                unset($pass2);
				echo "New record created successfully";
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
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<script>
        function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "pass1") {
                        x.type = "text";
                } else {
                  x.type = "pass1";
                }
        }
</script>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign Up.</h2>
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="fname" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $fname ?>" />
                </div>
                <span class="text-danger"><?php echo $fnameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $lname ?>" />
                </div>
                <span class="text-danger"><?php echo $lnameError; ?></span>
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
            	<input type="password" name="pass1" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $pass1 ?>" id="myInput" />
                </div>
                <span class="text-danger"><?php echo $pass1Error; ?></span>

                <!-- An element to toggle between password visibility -->
                <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
            </div>
            
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass2" class="form-control" placeholder="Re-Enter Password" maxlength="15" value="<?php echo $pass2 ?>" id="myInput" />
                </div>
                <span class="text-danger"><?php echo $pass2Error; ?></span>

                <!-- An element to toggle between password visibility -->
                <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
