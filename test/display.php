<?php
require_once('dbcon.php');
try 
{
   $sql = 'SELECT * FROM form ORDER BY form_id';
   $q = $conn->query($sql);
   $q->execute();
   $q->setFetchMode(PDO::FETCH_ASSOC);
} 
catch (PDOException $e) 
{
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
            <h1 class="title is-6 ">DISPLAYED DATA:-</h1>
            <table class="table is-bordered">
                <thead>
                    <tr>
                        <th>USER LISTS:-</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $q->fetch()) : ?>
                    <tr>
                    <td><a href="<?php echo 'single_data.php?form_id='.$row['form_id']?>"> <?php echo htmlspecialchars($row['firstname']);?></a></td>
                    </tr>
                <?php endwhile ; ?>
                </tbody>
            </table>
    </body>
</div>
</html>

<?php
echo "<br>";
echo "number of records entered:";
$count = $conn->query("SELECT count(1) FROM form")->fetchColumn();
echo $count;
?>

