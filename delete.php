<?php ob_start();
try{
$id= filter_input(INPUT_GET, 'id');
//require databse is opened.
require_once('connect.php');
//sql statement is returned for delete.
$sql="DELETE FROM reg_detail where user_id= :user_id;";
//prepare statement is created for sql.
$statement= $db->prepare($sql);
//bind the statement.
$statement->bindParam(':user_id',$id);
//to excute the query.
$statement->execute();
//db connection closure
$statement->closeCursor();
header('location:dbtable.php');
}
catch(PDOException $e)
{
$error_message=$e->getMessage();
echo"<p> $error_message</p>";

}
ob_flush();
?>
