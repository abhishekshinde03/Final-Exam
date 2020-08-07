<!DOCTYPE html>
<html>
<head>
    <title>Cricket Team</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>


<div>
    <form action="process3.php" method="post">
        <div class="container">
            <div class="row">
                <div class= "col-sm-3">

                    <h1>Players Details</h1>

                    <p>Players Registration Form.</p>

                    <?php

                    //initialization varibales.
                    $id= null;
                    $email= null;
                    $pass= null;

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
                            $email= $record['email'];
                            $pass= $record['password'];
                        endforeach;
                        //close for the database connection
                        $statement->closeCursor();


                    }

                    ?>
                    <form action="process3.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $id;?>">
                        <hr class="mb-6">

                        <label for="email"><b>E-mail Id:</b></label>
                        <input class="form-control" type="email" name="email" required value="<?php echo $email;?>">
                        <label for="password"><b>Password:</b></label>
                        <input class="form-control" type="password" name="pass" required value="<?php echo $pass;?>">
<br>
                        <input  class="btn btn-primary" type="submit" name="submit" value="SUBMIT"><br><br>
                        <h3>NOT Have an Account | <a href="registration.php">Click here for Signup</a> </h3>
                </div>
            </div>
    </form>
</div>
</body>
</html>
