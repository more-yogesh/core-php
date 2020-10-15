<?php
include('../connection.php');
$records = $db->query('SELECT * FROM `users`');
// print_r($records); object details

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['status'])) {
        echo "Deleted Successfully!"; 
    }
    ?>
    <h1>User List</h1>
    <a href="create.php">CREATE NEW RECORD</a>
    <table border="1">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>Gender</td>
            <td>Hobbies</td>
            <td>Address</td>
            <td>Action</td>
        </tr>
        <?php
        while ($row = $records->fetch_object()) {
        ?>
            <tr>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->mobile; ?></td>
                <td><?php echo $row->gender; ?></td>
                <td><?php echo $row->hobbies; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><a href="show.php?id=<?php echo $row->id; ?>">Show</a></td>
                <td>
                    <!-- <a href="delete.php?delete_id=<?php echo $row->id; ?>">DELETE</a> -->
                    <form method="post" action="delete.php">
                        <input type="hidden" name="delete_id" value="<?php echo $row->id?>">
                        <input type="submit" value="DELETE">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>