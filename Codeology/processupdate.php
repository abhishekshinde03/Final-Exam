
<?php
if(isset($_POST['submit']))
{
    require_once ('connect.php');
    $position = filter_input(INPUT_POST,'position');
    $current_city = filter_input(INPUT_POST,'current_city');
    try{
$sql = "UPDATE reg_detail SET positions = :position, current_city = :current_city";

//call the prepare method of the PDO object, return PDOStatement Object
$statement = $db->prepare($sql);

//bind parameters
$statement->bindParam(':position', $position);
$statement->bindParam(':current_city', $current_city);

//execute the query
$statement->execute();
header('location:dbtable.php');
    }
    catch(Exception $ex)
    {
        echo "<p> Unable to process your project..!! I am really Sorry our team members will go through your error. </p>";
        $error_message = $ex->getMessage();
        echo $error_message;
    }
}
?>