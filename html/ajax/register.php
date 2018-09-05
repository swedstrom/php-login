<?php include('process.php'); ?>
<style>
body{width:50%;}
#frmCheckUsername {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>

<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
  <!-- scripts -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div id="frmCheckUsername">
  <label>Check Username:</label>
  <input name="username" type="text" id="username"  autocomplete="off" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>    
</div>
</body>
</html>
