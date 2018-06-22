<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <title>Form</title>
</head>

<body>
  <form method="POST">
  <?php
  ini_set('display_errors', '1');
            require_once('dbcon.php');
            $id=$_GET["form_id"];
            if (isset($_POST["update"])) 
            {
                $firstname=$_POST["firstname"];
                $lastname=$_POST["lastname"];
                $email=$_POST["email"];
                $hobbies=$_POST["hobbies"];
                $gender=$_POST["gender"];
                try 
                {
                    $sql ="UPDATE form SET firstname= '$firstname',lastname= '$lastname', email= '$email', hobbies='$hobbies', gender='$gender' WHERE form_id='$id'";
                    $stmt = $conn->prepare($sql);
                    // execute the query
                    $stmt->execute();
                    header("Location:display.php");

                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

            }
                $qry = $conn->prepare("SELECT * from form WHERE form_id='$id'"); 
                $qry->execute();
                $result = $qry->fetch();
  ?>
  <div class="container">
    <style>
      .container {
        border: 2px solid black;
        border-radius: 10px;
        background-color:powderblue;
      }
    </style>
      <h1 class="title is-4 has-text-centered">EDIT FORM</h1>
      <div class="field">
        <label class="label">firstName</label>
        <div class="control has-icons-left">
          <input class="input is-success" name="firstname" value="<?php echo $result['firstname']; ?>" type="text" required placeholder="enter first name">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">lastname</label>
        <div class="control has-icons-left">
          <input class="input is-info" name="lastname"  type="text" value="<?php echo $result['lastname']; ?>" required placeholder="enter last name">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Email</label>

        <div class="control has-icons-left">
          <input class="input is-success " type="email" value="<?php echo $result['email']; ?>" required placeholder="Email input" name="email" >
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">password</label>
        <div class="control has-icons-left">     
        
          <input class="input" id="password" type="password" required placeholder="input password">
          <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
              </div>
        </div>
        
        <div class="field">
          <label class="label">hobbies</label>
          <div class="control">
            <textarea class="textarea is-warning" required placeholder="Textarea" value="<?php echo $result['hobbies']; ?>" name="hobbies"></textarea>
          </div>
      </div>  

  <div class="field">
    <div class="control">
      <label class="label">Gender</label>
      <label class="radio">
        <input type="radio" name="gender"  value="male">
        male
      </label>
      <label class="radio">
        <input type="radio" name="gender" value="female">
       female
      </label>
    </div>
  </div>
   
  <input type="submit" value="Submit" name="update"/>
  
</form>
</body>

</html>


