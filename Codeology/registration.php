
<!DOCTYPE html>
<html>
<head>
	<title>Cricket Team</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>


	<div>
		<form action="process2.php" method="post">
			<div class="container">
				<div class="row">
					<div class= "col-sm-3">

				<h1>Developers Community</h1>
					
				<p>Developer Registration Form.</p>

				<?php

				//initialization varibales.
				$id= null;
				$firstname= null;
				$lastname= null;
				$phone_no= null;
				$email= null;
				$pass = null;
				$confirmpass = null;
				$current_city= null;	
				$position= null;
				$photo=null;

				//if condition is checked for Id.
				if(!empty($_GET['id']) && (is_numeric($_GET['id'])))
				{
					//we have to grab the id from the url
					$id= filter_input(INPUT_GET,'id');
					// connect to the database 
					require_once('connect.php');
					// set the select query
					$sql= "SELECT * FROM reg_detail where user_id= :user_id;";
					// NOW WE HAVE TO PREPARE THE QUERY FOR EXECUTION
					$statement= $db->prepare($sql);
					//bind the user id
					$statement->bindParam(':user_id', $id);
					//Execute your statement
					$statement->execute();
					// use fullAll to share the records
					$records= $statement->fetchAll();
					//to loop throught the foreach looping
					foreach($records as $record) :
						$firstname= $record['firstname'];
						$lastname= $record['lastname'];
						$email= $record['email'];
						$phone_no = $record['phone_no'];
						$pass= $record['password'];
						$current_city= $record['current_city'];
						$position= $record['positions'];
						$photo  =   $record['Photo'];
					endforeach;
					//close for the database connection
					$statement->closeCursor();


				}

				?>

				<form action="process2.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php echo $id;?>">
					<hr class="mb-6">
						<label for="firstname"><b>First Name:</b></label>
						<input class="form-control" type="text" name="firstname" required value="<?php echo$firstname;?>">
			
				
						<label for="lastname"><b>Last Name:</b></label>
						<input class="form-control" type="text" name="lastname" required value="<?php echo $lastname;?>">

                        <label for="phone_no"><b>Phone Number:</b></label>
                        <input class="form-control" type="text" name="phone_no" required value="<?php echo $phone_no;?>">
						<label for="email"><b>E-mail Id:</b></label>
						<input class="form-control" type="email" name="email" required value="<?php echo $email;?>">

						<label for="password"><b>Password:</b></label>
						<input class="form-control" type="password" name="pass"required value="<?php echo $pass;?>">
                    <label for="confirmpass"><b>Confirm Your Password:</b></label>
                    <input class="form-control" type="password" name="confirmpass"required value="<?php echo $confirmpass;?>">
                    <label for="current_city"><b>Current City:</b></label>
                    <input class="form-control" type="text" name="current_city"required value="<?php echo $current_city;?>">

                    <label for="position"><b>Position:</b></label>
						<input class="form-control" type="text" name="position" required value="<?php echo $position;?>">
						<hr class="mb-6">
						<input  class="btn btn-primary" type="submit" name="submit" value="SUBMIT">
                    <h3>Already Have an Account | <a href="login.php">Click here for login</a> </h3>
					</div>
			</div>
		</form>
	</div>
</body>
</html>
