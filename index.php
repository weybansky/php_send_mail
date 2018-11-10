<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Send Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	
</head>
<body>

	<div style="margin-bottom: 20px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				
				<?php if (isset($_GET['status'])): ?>
					<div class="alert alert-<?= $_GET['status'] ?> alert-dismissible" role="alert">
					  <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					  <?php if ($_GET['message']): ?>
					  	<?= $_GET['message'] ?>
					  <?php endif ?>
					</div>
				<?php endif ?>

				<form action="index.php" method="POST">
					<div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" name="fname" class="form-control">
					</div>
					<div class="form-group">
						<label for="lname">Last Name</label>
						<input type="text" name="lname" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="contact">Contact number</label>
						<input type="text" name="contact" class="form-control">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select name="gender" class="form-control" id="gender">
							<option value="0">-- Select Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="location">Location</label>
						<input type="text" name="location" class="form-control">
					</div>
					<div class="form-group">
						<label for="destination">Destination</label>
						<input type="text" name="destination" class="form-control">
					</div>						

					<div class="form-group">
						<button name="submit" type="submit" class="form-control btn btn-warning">Submit</button>
					</div>

					<?php

						if (isset($_POST['submit']))
						{
							$validation = true;


							// Declare values
							$fname 			 = $_POST['fname'];
							$lname 			 = $_POST['lname'];
							$email 			 = $_POST['email'];
							$contact 		 = $_POST['contact'];
							$gender 		 = $_POST['gender'];
							$location 	 = $_POST['location'];
							$destination = $_POST['destination'];

							// Form field validation
							// validation == false when it fails
							// First name
							if (empty($fname)) {
								$validation == false;
								header("location: index.php?status=danger&message=First Name is empty");
								exit();
							}
							// Last name
							if (empty($lname)) {
								$validation == false;
								header("location: index.php?status=danger&message=Last Name is empty");
								exit();
							}
							// Email
							if (empty($email)) {
								$validation == false;
								header("location: index.php?status=danger&message=Email is required");
								exit();
							}
							// Contact number
							if (empty($contact)) {
								$validation == false;
								header("location: index.php?status=danger&message=Contact Number is empty");
								exit();
							}
							// Gender
							if ($gender == '0') {
								$validation == false;
								header("location: index.php?status=danger&message=Gender is empty");
								exit();
							}
							// Location
							if (empty($location)) {
								$validation == false;
								header("location: index.php?status=danger&message=Location is empty");
								exit();
							}
							// Destination
							if (empty($destination)) {
								$validation == false;
								header("location: index.php?status=danger&message=Destination is empty");
								exit();
							}

							if ($validation == true) {
								// Send the email
								include "mail.php";
							}
						}

					?>

				</form>
			</div>
		</div>
	</div>
	
</body>
</html>