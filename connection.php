<?php

	//$db=mysqli_connect("localhost","root","","hackovid"); 
					/* server name, username, password, database name*/
		$db=mysqli_connect("localhost","root","","hackovid"); 

	if(!$db){
		echo 'Connection error...'.mysqli_connect_error();
	}

?>