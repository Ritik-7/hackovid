<?php 
include "connection.php";
//include"navbar2.php";
	$eventName=$name=$email=$phone='';
	$errors=array('eventName'=>'','name'=>'' , 'email'=>'' , 'phone'=>'' );
	if(isset($_POST['submit'])){
		if(empty($_POST['eventName'])){
			$errors['eventName']= '* Event name is required ';
			} else{
			$name=$_POST['eventName'];
			 //echo htmlspecialchars($_POST['event_name']);
			}
		if(empty($_POST['name'])){
			$errors['name']= '* User name is required ';
			} else{
			$name=$_POST['name'];
			 //echo htmlspecialchars($_POST['event_name']);
			}

			if(empty($_POST['email'])){
			$errors['email']= '* An email is required ';
			} else{
			$email=$_POST['email'];
			 //echo htmlspecialchars($_POST['event_name']);
			}
			if(empty($_POST['phone'])){
			$errors['phone']= '* Contact no. is required ';
			} else{
			$phone=$_POST['phone'];
			 //echo htmlspecialchars($_POST['event_name']);
			}

			if(array_filter($errors)){
		//echo 'errors in the form';
		} else{
			$eventName=mysqli_real_escape_string($db,$_POST['eventName']);
			$name=mysqli_real_escape_string($db,$_POST['name']);
			$email=mysqli_real_escape_string($db , $_POST['email']);
			$phone=mysqli_real_escape_string($db , $_POST['phone']);
			

			$sql1="INSERT INTO regs(eventName,username,email,phone) VALUES('$eventName','$name','$email','$phone')" ;
			// save to db and check

			if(mysqli_query($db, $sql1)){
				//success

				header('Location:user.php');
			}
			else{
				echo 'query error' . mysqli_error($db);
			}

			
		}

	}//end of POST check

?>


<!DOCTYPE html>
<html>

	 		<?php include "templates/header1.php"; ?>

	<section class=" container black-text">
		<h5 class="center">Registration Details</h5>

		<form class="white" action="regform.php" method="POST">
			<label>Event Name:</label>
			<input type="text" name="eventName" value="<?php echo $eventName; ?>">
			<div class="red-text"><?php echo $errors['eventName']; ?></div>
			<label>User Name:</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Registered Email:</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Phone No.:</label>
			<input type="text" name="phone" value="<?php echo $phone; ?>">
			<div class="red-text"><?php echo $errors['phone']; ?></div>
				<div class="center">
		 		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		 	</div>
		 	</form>
	</section>
	
		
	

 		<?php include "templates/footer.php"; ?>

</html>