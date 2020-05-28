<?php
	session_start();
	include"connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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


<?php
	
	$r=mysqli_query($db,"SELECT COUNT(seen_status) AS `total` FROM `queries` where `seen_status`='no' and `sender`='admin';"); 
 	$c=mysqli_fetch_assoc($r);
?>


<nav class="navbar navbar-inverse" style="padding: 17px; word-spacing: 5px; margin-bottom: 0px;background-color: #1d1d1d;">
	<div class="container-fluid">
		<div class="navbar-header">
			
			<!---------   adding logo    --------->
			<img src="images/9.jpg" style="height: 70px; width: 220px;">

			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


		</div>
		<div>
			<ul class="nav navbar-nav">
				<li><a href="organiser.php" style="font-size: 16px; text-decoration: none; display: bold;"><span class=" glyphicon glyphicon-home"> HOME</span></a></li>
				
			</ul>
		</div>




			<?php 
				if(isset($_SESSION['login_user']))
				{
			?>
					<ul class="nav navbar-nav navbar-right">
						<?php
							$res=mysqli_query($db,"SELECT * from `register` where username='$_SESSION[login_user]' ;");
							while ($row=mysqli_fetch_assoc($res)) 
							{
								if($row['status']=='student')
								{						
						?>
							
						<li><a href="queries.php"><span class="glyphicon glyphicon-envelope"></span> <span class="badge bg-green">
							<?php
								echo $c['total'];
							?>
						</span> </a> </li>
						<li><a href="profile.php">
						<div style="color: white;">
						
						<?php
							echo "<img class='img-circle profile_img' height=40 width=40 style='' src='images/".$_SESSION['pic']." '>";
							echo" ".$_SESSION['login_user'];
						?>
						</div> 
					</a></li>
						

						<?php
								}
								else
								{

									$r=mysqli_query($db,"SELECT COUNT(seen_status) AS `total` FROM `queries` where `seen_status`='no' and `sender`='student';");  
 									$c=mysqli_fetch_assoc($r);

						?>
							<li></li>
							
				        

						<li><a href="replies.php"><span class="glyphicon glyphicon-comment" title="messages" style="cursor:pointer;font-size:20px;"> </span> <span class="badge bg-green">
							
							<?php
								echo $c['total'];
							?>

						</span> </a> </li>
						<li><a href="profile.php">
						<div style="color: white;">
						
						<?php
							echo "<img class='img-circle profile_img' height=50 width=50 src='images/".$_SESSION['pic']." '>";
							echo" ".$_SESSION['login_user'];
						?>
						</div> 
					</a></li>

						<?php
								}
							}	
						?>

						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
					</ul>
			<?php
				}
				else
				{

				}
			?>			
	</div>
</nav>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  						<center><div style="color: white; font-size: 20px;">
						
						<?php
							if(isset($_SESSION['login_user']))
							{
								echo "<img class='img-circle profile_img' height=100 width=100 src='images/".$_SESSION['pic']." '>";
								echo "</br></br>";
								echo" <b>".$_SESSION['login_user'];
								echo "</b>";
							}						
						?>
						</div></center> 
						<br>

    <?php
  	$q=mysqli_query($db,"SELECT * FROM `register` where username='$_SESSION[login_user]';");
  	$r=mysqli_fetch_assoc($q);
  	if($r['status']=='student')
  	{
  	?>	
  		<div class="h"><a href="user.php">Home</a></div>
  		<div class="h"><a href="profile.php">My Profile</a></div>
 		<div class="h"><a href="userinfo.php">My Records</a></div>	
 	<?php
 	}
 	else
 	{
 	?>	<div class="h"><a href="organiser.php">Home</a></div>
 		<div class="h"><a href="profile.php">My Profile</a></div>
 		<div class="h"><a href="test1.php">My Events</a></div>
  		<div class="h"><a href="add.php">Add Events</a></div>
 		<div class="h"><a href="email.php">Create E-mail</a></div>	
 	<?php
 	}	
  ?>
  </div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "lightpink";
}
</script>
</body>
</html>