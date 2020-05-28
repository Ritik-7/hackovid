<?php
	include"connection.php";
	include"navbar2.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>participation record</title>
	<style type="text/css">
	body 
	{
		 height: 100%;
		 width: 100%; 
		 background-color: lightpink;
		 transition: background-color .5s;
	}

	.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 0;
  top: 0;
  left: 0;
  background-color: #1d1d1d;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
    margin-top: 85PX;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}
.sidenav a:hover {
		  color: #f1f1f1;}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
		{
			color: white;
			width: 300px;
			height: 50px;
			background-color: #00544c;
		}
		.page
		{
			width: 70%;
			height: auto;
			background-color:#629911;
			opacity: .8;
			color: white;
			box-shadow: 2px 10px 12px black;
			margin-top: 5%;
		}
	</style>
</head>
<body>


<center><div class="page">
	<h2><b><u>YOUR ORGANISED EVENTS</u></b></h2>
	<?php	
		$q=mysqli_query($db,"SELECT * FROM register where username='$_SESSION[login_user]';");
		
		if(mysqli_num_rows($q)==0)
		{
			echo"<h2><center><b>NO EVENTS ORGANISED YET...</b></center></h2>";
		}
		else
		{
			echo"<table class ='table table-bordered table-hover'>";
			echo "<tr style='background-color: #9cb5e6;'>";
			echo"<th>"; echo"EVENT"; echo"</th>";
			echo"<th>"; echo"START DATE"; echo"</th>";
			echo"<th>"; echo"START TIME"; echo"</th>";
			echo"<th>"; echo"END DATE"; echo"</th>";
			echo"<th>"; echo"END TIME"; echo"</th>";
			echo"</tr>";
		
			$row=mysqli_fetch_assoc($q);	
			$req=$row['first'].' '.$row['last'];
			// echo $req;	
				$res=mysqli_query($db,"SELECT * FROM events where organiserName='$req';");
				while($ans=mysqli_fetch_assoc($res))
				{
				echo"<tr>";
				echo "<td>"; echo $ans['event_title']; echo "</td>";
				echo "<td>"; echo $ans['start_date']; echo "</td>";
				echo "<td>"; echo $ans['start_time']; echo "</td>";
				echo "<td>"; echo $ans['end_date']; echo "</td>";
				echo "<td>"; echo $ans['end_time' ]; echo "</td>";
				echo"</tr>";
			}
			echo"</table>";	
		}
		
	?>
</div></center>	
</body>
</html>