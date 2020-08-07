<?php
require_once('checksession.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thanks for Registration</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
   <div>
   <div class="container">

 	<hr class="mb-3">

        <h1 align='center'>Developers Community</h1>
        <?php
        $email = $_SESSION['email'];
        		try{
			 //Include the db to access all operations
			 include_once('connect.php');

			 // select query for databse
			$sql="SELECT * FROM reg_detail WHERE email = :email";

			//prepare statement for query
			$statement = $db->prepare($sql);
            $statement->bindParam(':email',$email);
			//excute the query
			$statement->execute();

			//use the fetchAll method to store all the data
			$records= $statement->fetchAll();
			// print the Table details
			echo "<table border='1px' class='table table-hover'><thead class= 'thead-dark'><th> First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Current City</th><th>Position</th><th>Delete</th><th>Update</th><th>Photo</th><th>Logout</th></thead><tbody>";
			//foreach loop to print the records
			foreach ($records as $record){
			echo"<tr><td>". $record['firstname'] . "</td><td>" . $record['lastname']. "</td><td>". $record['phone_no'] . "</td><td>". $record['email'] . "</td><td>" .  $record['current_city']. "</td><td>". $record['positions']."<td><a href='delete.php?id=". $record['user_id']. "'> Delete</a></td><td><a href='update.php?id=". $record['user_id']. "'> Update</a></td><td><img src='images/". $record['Photo']."' style='width: 50px;height: 50px'></td><td><a href='Signout.php?id=". $record['user_id']. "'> Logout</a></td></tr>";
			}	
			echo "</tbody></table>";	
			// db disconnection
			$statement->closeCursor();

		}
			// Catch Exception will print
			catch(PDOException $e){
			$error_message= $e->getMessage();

			echo"<p> $error_message</p>";

			}
		?>
    
    </div>
  </div>
</div>
</div>
   <div class="container">
   <form action='photo.php' enctype="multipart/form-data" method='POST'>
       <h3>Add Your Profile Picture</h3>

       <input type='FILE' name='photo' id='profile'>
       <p><input type='submit' name='submit' value='Upload Profile Picture'></p>
   </form>
   </div>
</body>
</html>