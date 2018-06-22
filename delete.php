<?php
require_once('dbcon.php');
$form_id=$_GET['form_id'];
try 
{
    $sql = "DELETE FROM form WHERE form_id='$form_id'";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo 'alert("Record deleted successfully");';
    header('Location:display.php');
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>