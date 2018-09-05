<?php

$con = mysqli_connect("192.168.9.12", "dbbob", "ThePass", "testdb");

if (mysqli_connect_errno())
{

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

  // $username = $_POST["username"];

  $username = 'sam';

  $query = mysqli_query($con,"SELECT * FROM users WHERE fname =   '$username' ");

  $find = mysqli_num_rows($query);

  echo $find;

  mysqli_close($con);

  ?>
