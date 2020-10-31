<?php
include_once('../connection.php');

if (isset($_REQUEST['btnRegister'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $insertQuery = "INSERT INTO `users` (`name`, `email`, `password`)
        VALUES ('$name', '$email', '$password');";

    $isSuccess = $db->query($insertQuery);
    if ($isSuccess) {
        header('location:login.php?success=user register successfully!');
    }
    echo "Registration fail!!!";
}
?>
<?php
include_once('../includes/header.php');
?>
<h1>Register Page</h1>
<form method="post">
    Name: <input type="text" name="name" id=""><br />
    Email: <input type="email" name="email" id=""><br />
    Password: <input type="password" name="password" id=""><br />
    Confirm Password: <input type="password" name="password" id=""><br />
    <input type="submit" value="Register" name="btnRegister">
</form>
<?php
include_once('../includes/header.php');
?>