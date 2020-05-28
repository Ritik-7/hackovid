<?php
//session_start();
include "connection.php";
	include"navbar.php";
	 
$sql='SELECT organiserName,event_title,start_date,end_date,start_time,end_time FROM events ORDER BY created_at DESC';
	//make query and get result
	$result=mysqli_query($db,$sql);
	//fetch resulting rows a
	$events=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result); //from memory

	mysqli_close($db);
	
//  print_r($events);


//include"organiser.php";
?>


<!DOCTYPE html>
<html>
<head>
<title></title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">
		body{
			background-color: lightpink;
		}
		.center{
			text-align: center;
		}
		
		.card {
			background-color: #000000;
  box-shadow: 0 4px 8px 0 rgba(3.0,3.0,3.0,3.0);
  transition: 0.3s;
  width: 40%;
  padding: 40px;
  border-radius: 10px;
  margin: 40px;
  float: left;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(3,3,3,3);
}

.container {
  padding: 2px 16px;
}
.card-content{
	text-decoration-color: white;

}

h1{
/*  //background-color: black;
*/  color: #000000;
text-decoration: underline overline;
}
h2 {
	color: #ffffff;
}
h3{
		color: #ffffff;

}
h5{
	color: #ffffff;
}
.right-align{
	text-align: right;
}
.brand{
	color: #ffffff;
}

	</style>
</head>
<body>
<h1 class="center">EVENTS</h1>
<br>
<div class="container " >
	<div class="row">
		<?php foreach($events as $event) {?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<div class="card-content center white-text">
						
							<h2> <?php echo 'EVENT NAME : '. htmlspecialchars($event['event_title']); ?></h2>
							<h3><?php echo 'Organiser Name:' . htmlspecialchars($event['organiserName']); ?></h3>
						
						<h5><?php echo '-> Starts on '.htmlspecialchars($event['start_date']) . '  at  ' .htmlspecialchars($event['start_time']) ; ?></h5>
						<h5><?php echo '-> Ends on '. htmlspecialchars($event['end_date'] ). ' at ' . htmlspecialchars($event['end_time']); ?></h5>

						
						<h5>No. of Participants Registered :   </h5>
					</div>
					<div class="card-action right-align">
						<?php 
							if(isset($_SESSION['login_user']))
							{
						 ?>
						 <br>
						<a class="right-align brand" href="regform.php"> REGISTER</a>
					<?php } 
						else {
					?>
					<br>
					<a class="right-align brand" href="login.php"><h5>REGISTER</h5>  </a>
				<?php } ?>

				</div>
			</div>
		</div>
		<?php } ?>
	
</div>
</div>
 <?php  
 		include('templates/footer.php');
  ?>

</html>
	
