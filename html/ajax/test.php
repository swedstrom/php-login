<html>
<head>
<title>Disable submit button until all form's fields are filled</title>
   
<!--
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
 Note you can download the JQuery package instead of using Google version. -->
<script src="jquery-3.3.1.min.js"></script>
 <script>
     $(document).ready(function() {
  
$(function() {
    $('#sbtbtn').attr('disabled', 'disabled');
});
 
$('input[type=text],input[type=password]').keyup(function() {
        
    if ($('#target1').val() !=''&&
    $('#target2').val() != '' &&
    $('#target3').val() != ''&&
    $('#target4').val() != '') {
      
        $('#sbtbtn').removeAttr('disabled');
    } else {
        $('#sbtbtn').attr('disabled', 'disabled');
    }
});
    });
</script>
  
<style type="text/css">
html { background: #fafafa; }
  
#myDiv
{
background: #0505C0;
border: 10px solid #11e;
padding: 10px;
color: Yellow;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
line-height: 25px;
text-align: justify;
}
  
#myDiv { width: 500px; }
</style>
  
</head>
  
<body>
  
<div id="myDiv">
        <center>
     <form action="#"   id="Once">
     <table border="1">
     <tr>
     <td><strong>username:</strong></td>
<td><input type="text" name="username" id="target1" />
     </tr>
     <tr>
     <td><strong>password:</strong></td>
<td><input type="password" name="password" id="target2" />
     </tr>
     <tr>
     <td><strong>Confirm password:</strong></td>
<td><input type="password" name="password2" id="target3" />
     </tr>
      <tr>
     <td><strong>Email</strong></td>
<td><input type="text" name="email" id="target4" />
     </tr>
     <tr>
     <td colspan="2">
      <center><input type="submit" value="submit"  id="sbtbtn" />
       
     </td>
       
     </form>
     </center>
</div>
  
</body>
</html>
