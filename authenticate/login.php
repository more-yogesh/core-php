<?php
include('../connection.php');
if (isset($_REQUEST['btnLogin'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $loginQuery = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ";

    $rows = $db->query($loginQuery);

    if ($rows->num_rows == 1) {
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = $rows->fetch_object();
        header('location:../students/index.php');
    } else {
        echo "Login fail";
    }
}


?>

<?php
include('../includes/header.php');
?>
<h1>Login Page</h1>
<form method="post">
    Email: <input type="email" name="email" id=""><br />
    Password: <input type="password" name="password" id=""><br />
    <input type="submit" value="Login" name="btnLogin">
</form>
<?php
include('../includes/footer.php');
?>