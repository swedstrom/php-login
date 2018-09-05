<?php include('process.php'); ?>
<html>
<head>
  <title>Register</title>
 <!-- scripts -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="script.js"></script> <link rel="stylesheet" href="style.css">
</head>
<body>
 <form autocomplete="off" id="register_form">
      <h1>Register</h1>
      <div id="error_msg"></div>
        <div class="divTable">
            <div class="divTableBody">
                <div class="divTableRow">
                     <div class="divTableCell1">
                        <input type="text" name="username" placeholder="Username" id="username" onBlur="checkUserAvailability()" autocomplete="nope" > 
                     </div>
                     <div class="divTableCell2" id="info1"><span id="user-availability-status"></span></div>
                </div> 
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="email" placeholder="Email" id="email" onBlur="checkEmailAvailability(email)" autocomplete="nope" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="email-availability-status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="password" name="password1" placeholder="Password" id="password1" onBlur="checkPasswordMatch()" autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="password1-availability-status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="password" name="password2" placeholder="re-enter Password" id="password2" onkeyup="checkPasswordMatch()" autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="password-status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="fname" placeholder="First Name" id="fname" onBlur="fnameChk()"  >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="fname-status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="lname" placeholder="Last Name" id="lname" onBlur="lnameChk()" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="lname-status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="addy1" placeholder="Address" id="addy1" autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="addy2" placeholder="Address 2" id="addy2"  autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="city" placeholder="City" id="city"  autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="state" placeholder="State" id="state" autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="info2"><span id="state-status"></span></div>
                    <div class="divTableCell3">
                       <input type="text" name="zip" placeholder="Zip" id="zip" autocomplete="off" >
                    </div>
                    <div class="divTableCell4" id="info2"><span id="status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                       <input type="text" name="blank" placeholder="blank" id="blank" onBlur="chkBlank()" autocomplete="off" >
                    </div>
                    <div class="divTableCell2" id="blank"><span id="status"></span></div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell1">
                    </div>
                    <div class="divTableCell2" "><input type="submit" id="sbtbtn" value="submit"  /></div>
                </div>

            </div>  <!-- divTableBody end --> 
        </div>      <!-- divTable end -->    




    </form>
</body>
</html>

