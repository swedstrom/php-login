<?php
if(isset($_POST["email"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli('192.168.9.12' , 'dbbob', 'ThePass', 'testdb');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
                $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

                $statement = $mysqli->prepare("SELECT email FROM users WHERE email=?");
                $statement->bind_param('s', $email);
                $statement->execute();
                $statement->bind_result($email);
                if($statement->fetch()){
                   die('<img src="assets/images/not-available.png" />');
                }else{
                   die('<img src="assets/images/available.png" />');
                }
?>
