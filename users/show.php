<?php
include('../connection.php');
$id = $_GET['id'];
$query = "SELECT * FROM `users` WHERE id = $id";
$record = $db->query($query);
$row = $record->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4><a href="index.php">Back</a></h4>
    <h3>Name: <?php echo $row->name;?></h3>
    <h3>Email: <?php echo $row->email;?></h3>
</body>

</html>