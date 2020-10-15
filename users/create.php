<?php
include('../connection.php');

$passwordError = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hobbies = implode("-",$_POST['hobbies']);
    $address = $_POST['address'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $passwordError =  "Password not match";
    } else {
       $insertQuery = "INSERT INTO `users` (`email`, `name`, `mobile`, `password`, `gender`, `address`, `hobbies`) VALUES ('$email', '$name', '$mobile', '$password', '$gender', '$address', '$hobbies')";

        if ($db->query($insertQuery)) {
            // echo "1 Record inserted!";
            header('location:index.php');
        } else {
            echo "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="hidden" name="role" value="student">
        <table border="0">
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name" placeholder="Enter Your Name" value="yogesh"></td>
            </tr>
            <tr>
                <td><label for="mobile">mobile</label></td>
                <td><input type="number" name="mobile" id="mobile" value="123456"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" id="male" name="gender" value="male" checked><label for="male">I am male</label></br>
                    <input type="radio" name="gender" value="female" checked >I am female</br>
                </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td><input type="checkbox" name="hobbies[]" value="travel">Travel<br/>
                <input type="checkbox" name="hobbies[]" value="reading">Reading<br/>
                <input type="checkbox" name="hobbies[]" value="eating">Eating<br/></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="" rows="10" cols="60">G8, Swaminayarnt</textarea></td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select name="country" multiple>
                        <option value="">SELECT COUNTRY</option>
                        <option value="ind" selected>INDIA</option>
                        <option value="usa">U.S.A.</option>
                        <option value="uk">UK</option>
                        <option value="aud">AUD</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" name="password" id="password" value="d1d21d2"></td>
            </tr>
            <tr>
                <td><label for="confirm_password">confirm password</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password">
                    <span style="color:red;">
                        <?php
                        echo $passwordError;
                        ?>
                    </span>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="submit" value="ADD" /></td>
            </tr>
        </table>

    </form>
</body>

</html>