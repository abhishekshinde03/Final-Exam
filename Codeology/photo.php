
<?php session_start();
        $photo = $_FILES['photo'] ['name'];
        $photo_type = $_FILES['photo'] ['type'];
        $photo_size = $_FILES['photo'] ['size'];
        $id = $_SESSION['email'];
        $flag = true;
        define('UPLOADPATH','images/');
        define('MAXFILESIZE',32786);
        if((($photo_type !== 'image/gif') || ($photo_type !== 'image/jpeg')) || ($photo_type !== 'image/jpg') || ($photo_type !== 'image/png') && ($photo_size < 0) && ($photo_size>= MAXFILESIZE))
        {
        if($_FILES['photo'] ['error'] !== 0)
        {
            $flag = false;
            echo "Please submit a photo that is a jpg, png, jpeg or gif and less than 32kb";
        }
      }
      if($flag === true)
      {
           try
           {
                   $target = UPLOADPATH . $photo;
                   move_uploaded_file($_FILES['photo']['tmp_name'],$target);
                   require_once('connect.php');
                   $sql = "UPDATE reg_detail SET Photo = :photo WHERE email = :email";
                   $stmt= $db->prepare($sql);
                   $stmt->bindParam(':photo',$photo);
                   $stmt->bindParam(':email',$id);
                   $stmt->execute();

               header('location:dbtable.php');
                   $stmt->closeCursor();

               }
               catch (PDOException $e) {
                   $error_message = $e->getMessage();
                   echo "Sorry we aren't able to process your submission at this time
                      We've alerted our admin and will let you know when things are fixed";
                   echo $error_message;
           }
      }
      else
      {
          echo "not inserted in form";
      }

?>