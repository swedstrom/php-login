<?php 
	include_once 'dbconnect.php';
echo "update 1.18 </br>";

		// check email exist or not
			$query = "SELECT email FROM users WHERE email='frank@There.com'";

			$result = mysqli_query($conn,$query);

			$row_cnt = mysqli_num_rows($result);
			printf("result set has %d rows.\n", $result);

echo "</br>";
			printf("row_cnt set has %d rows.\n", $row_cnt);

            //$rows = $result->fetch_object();
            //$clid = $row->count;
            

			//echo "clid is:".$clid." value<br>";
			//$count = mysql_num_rows($result);
			if($row_cnt==0){
				echo "</br>";

				echo "no emails";
			} else {
				echo "</br>";

				echo "email already exists";
            }
?>