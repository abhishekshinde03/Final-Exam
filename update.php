<?php
require_once('checksession.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cricket Team</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>


<div>
    <form action="processupdate.php" method="post">
        <div class="container">
            <div class="row">
                <div class= "col-sm-3">

                    <h1>Players Details</h1>

                    <p>Players Registration Form.</p>

                    <form action="processupdate.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="user_id">
                        <hr class="mb-3">
                        <label for="current_city"><b>Current City:</b></label>
                        <input class="form-control" type="text" name="current_city">
                        <label for="position"><b>Position:</b></label>
                        <input class="form-control" type="position" name="position">
                        <hr class="mb-3">
                        <input  class="btn btn-primary" type="submit" name="submit" value="SUBMIT">

                </div>
            </div>
    </form>
</div>
</body>
</html>
