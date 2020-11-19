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
    <fieldset onclick="loadData()">
        <legend>Your data</legend>
        <p id="newContent"></p>
    </fieldset>
    Name: <input type="text" name="name" id=""><br />
    Email: <input type="email" name="email" id="" onblur="checkEmail(this.value)"><br />
    <p class="message" style="display: inline;"></p>
    Password: <input type="password" name="password" id=""><br />
    Confirm Password: <input type="password" name="password" id=""><br />
    <input type="submit" value="Register" name="btnRegister">
</form>

<?php
include_once('../includes/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

    });

    function checkEmail(email) {
        userEmail = email;
        $.ajax({
            url: 'http://localhost/crude/check-data.php?email=' + userEmail,
            method: 'GET',
            success: function(successData) {
                if (successData == 0) {
                    $('.message').text('Email Already exist');
                    $('.message').append('<br/>');
                    $('.message').css("color", "red");
                } else {
                    $('.message').text('All Okay');
                    $('.message').append('<br/>');
                    $('.message').css("color", "green");
                }
                console.log(successData);
            },
            error: function(errorData) {
                console.log(errorData);
                $('.message').text(errorData);
                $('.message').append('<br/>');
                $('.message').css("color", "red");

            }
        });

    }

    function loadData() {
        $.ajax({
            url: 'http://localhost/crude/mydata.php',
            method: 'GET',
            success: function(successData) {
                console.log(successData);
                $('#newContent').text(successData);
            },
            error: function(errorData) {
                console.log(errorData);
            }
        });
    }
</script>