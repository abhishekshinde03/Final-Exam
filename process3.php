<?php
if(isset($_POST['submit'])) {

    //create variables to store form data
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, 'pass');
    $hashed_pass = md5($pass);


    //set up a flag variable to be default true.

    $ok = true;
    //validate

    //email not empty and proper format
    if (empty($email) || $email === false) {
        echo "<p class='error'>Please include your email in the proper format!</p>";
        $ok = false;
    }
    if (empty($pass) || $pass === false) {
        echo "<p class='error'>Please include your password in the proper format!</p>";
        $ok = false;
    }

    if ($ok === true) {

        try {

            //connect to our db
            require_once('connect.php');
            $sql = "SELECT email , password FROM reg_detail WHERE email = :email && password = :pass";

            //call the prepare method of the PDO object, return PDOStatement Object
            $statement = $db->prepare($sql);

            //bind parameters
            $statement->bindParam(':email', $email);
            $statement->bindParam(':pass', $hashed_pass);

            //execute the query
            $statement->execute();
            if($statement->rowCount() >0)
            {
                session_start();
                $_SESSION['email'] = $email;

                header('location:dbtable.php');
            }
            else
            {
                echo "Sorry try again letter";
            }
            //echo a your information is successfully stored


            //close the db connection
            $statement->closeCursor();
        } //When error occurs in the try block catch block will be printed
        catch (PDOException $e) {
            echo "<p>Unable to process your project..!! I am really Sorry our team members will go through your error. </p>";
            $error_message = $e->getMessage();
            echo $error_message;
        }
    }
}
?>