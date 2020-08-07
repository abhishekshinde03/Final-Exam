
<!DOCTYPE html>
<html>
<head>
  <title>Thanks for Registration</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
   <div>
   <div class="container">
				<div class="row">
					<div class= "col-sm-3">

				<h1>Cricket Team</h1>
 			<tr>
 				<?php
                if(isset($_POST['submit'])) {
                    require_once('connect.php');
                    //create variables to store form data
                    $firstname = filter_input(INPUT_POST, 'firstname');
                    $lastname = filter_input(INPUT_POST, 'lastname');
                    $phone_no = filter_input(INPUT_POST, 'phone_no');
                    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                    $pass = filter_input(INPUT_POST, 'pass');
                    $conpass = filter_input(INPUT_POST, 'confirmpass');
                    $current_city = filter_input(INPUT_POST, 'current_city');
                    $position = filter_input(INPUT_POST, 'position');
                    $photo = "";
                    $hashed_pass = md5($pass);
                    $id = null;
                    $id = filter_input(INPUT_POST, 'user_id');

                    /*if ((($photo_type !== 'images/gif') || ($photo_type !== 'images/jpeg')) || ($photo_type !== 'images/jpg') || ($photo_type !== 'images/png') && ($photo_size < 0) && ($photo_size >= MAXFILESIZE)) {
                        if ($_FILES['pic'] ['error'] !== 0) {
                            $flag = false;
                            echo "Please submit a photo that is a jpg, png, jpeg or gif and less than 32kb";
                        }
                    }
*/

                    //set up a flag variable to be default true.

                    $ok = true;
                    //validate
                    // first name and last name not empty

                    if (empty($firstname) || empty($lastname)) {
                        echo "<p class='error'>Please provide both first and last name! </p>";
                        $ok = false;
                    }
                    if (empty($phone_no) || $phone_no == false) {
                        echo "<p class='error'>Please provide your position! </p>";
                        $ok = false;
                    }
                    //email not empty and proper format
                    if (empty($email) || $email === false) {
                        echo "<p class='error'>Please include your email in the proper format!</p>";
                        $ok = false;
                    }
                    //Current city is empty or not properly formatted
                    if (empty($current_city) || $current_city === false) {
                        echo "<p class='error'>Please include your current city!</p>";
                        $ok = false;
                    }

                    //Skill is not empty or not properly formatted
                    if (empty($position) || $position === false) {
                        echo "<p class='error'>Please include your development skills!</p>";
                        $ok = false;
                    }

                }
                    //if form validates, try to connect to database and add info
                    if ($pass !== $conpass) {
                        echo "<p class='error'>Password does not match </p>";
                        $ok = false;
                    }

                    if ($ok === true) {

                        try {

                            //connect to our db

                            // if we have an id, that means we are updating the user
                            if (!empty($id)) {
                                $sql = "UPDATE reg_detail SET firstname= :firstname, lastname= :lastname,phone_no=:phone_no, email= :email, password= :pass, current_city= :current_city, positions= :positions, Photo=:photo WHERE user_id= :user_id;";
                            } //else set up SQL command to insert data into table
                            else {

                                $sql = "INSERT INTO reg_detail (firstname, lastname, phone_no, email,password, current_city, positions, Photo) 
                            VALUES (:firstname, :lastname,:phone_no, :email, :pass, :current_city, :positions , :photo)";
                            }

                            //call the prepare method of the PDO object, return PDOStatement Object
                            $statement = $db->prepare($sql);

                            //bind parameters
                            $statement->bindParam(':firstname', $firstname);
                            $statement->bindParam(':lastname', $lastname);
                            $statement->bindParam(':phone_no', $phone_no);
                            $statement->bindParam(':email', $email);
                            $statement->bindParam(':pass', $hashed_pass);
                            $statement->bindParam(':current_city', $current_city);
                            $statement->bindParam(':positions', $position);
                            $statement->bindParam(':photo', $photo);

                            //if we are empty
                            if (!empty($id)) {
                                $statement->bindParam(':user_id', $id);
                            }

                            //execute the query
                            $statement->execute();

                            //echo a your information is successfully stored

                            echo "<p> Thanks for Sharing your information for our Developers Community!
                            Please Login With your Credentials <h3><a href=\"login.php\">Click here for login</a> </h3></p>";

                            //close the db connection
                            $statement->closeCursor();
                        } //When error occurs in the try block catch block will be printed
                        catch (PDOException $e) {
                            echo "<p> Unable to process your project..!! I am really Sorry our team members will go through your error. </p>";
                            $error_message = $e->getMessage();
                            echo $error_message;
                        }
                    }

        ?>
		</tr>
		</div>
	</div>
</div>
</div>
</body>
</html>