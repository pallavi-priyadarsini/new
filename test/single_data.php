

<?php
require_once('dbcon.php');
ini_set('display_errors', '1');
try {
    $form_id = $_GET['form_id'];
    $sql = "SELECT form_id,firstname,lastname,email,hobbies,gender FROM form WHERE form_id ='$form_id'";


$q = $conn->query($sql);

 $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
   ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="title is-4 has-text-centered">DISPLAYED DATA:-</h1>
            <table class="table is-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Hobbies</th>
                        <th>Gender</th>
                        <th>delete</th>
                        <th>edit</th>
                       
                    </tr>
                </thead>
                <tbody>
                         <?php  ($row = $q->fetch()) ?> 
                        <tr>
                            <td><?php echo htmlspecialchars($row['firstname']) ?></td>
                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['hobbies']); ?></td>
                            <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            <td><a href="<?php echo 'delete.php?form_id='.$form_id ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            <td><a href="<?php echo 'edit_data.php?form_id='.$form_id ?>" onclick="return confirm('Do you want to edit this record?')">Edit</a>
                        </tr>
                  
                </tbody>
            </table>
    </body>
</div>
</html>