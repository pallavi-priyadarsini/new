<?php
require_once('dbcon.php');
ini_set('display_errors', '1');
if(filter_has_var(INPUT_POST,'submit')){
    echo 'The details submitted are the following:';
}
if(isset($_POST['submit_form'])){
      echo "<br>";
      echo 'firstname:';
      $firstname = htmlentities($_POST['firstname']);
      echo $firstname;
      echo "<br>";
      echo 'lastname:';
      $lastname = htmlentities($_POST['lastname']);
      echo $lastname;
      echo "<br>";
      echo 'Email:';
      $email = htmlentities($_POST['email']);
      echo $email;
      echo "<br>";
      echo 'hobbies:';
      $hobbies = htmlentities($_POST['hobbies']);
      echo $hobbies;
      echo "<br>";
      echo 'Gender:';
      echo "<br>";
      $gender = htmlentities($_POST['gender']);
      echo $gender;

      
    
 }
try {
 $sql = "INSERT INTO form (firstname,lastname, email, hobbies,gender)
 VALUES ('$firstname','$lastname', '$email', '$hobbies','$gender')";
 // use exec() because no results are returned
$conn->exec($sql);
 echo "New record created successfully";
 

 }
catch(PDOException $e)
 {
    die("Faild insertion :" . $e->getMessage());
 }
?>
<a href="display.php"> View all records</a>



